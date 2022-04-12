<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Entrada\CreateRequest;
use App\Http\Requests\Entrada\EditRequest;
use App\Http\Requests\Entrada\MultipleRequest;
use App\Http\Requests\Entrada\ImportRequest;
use App\Http\Requests\Entrada\StoreRequest;
use App\Http\Requests\Entrada\UpdateRequest;
use App\Ahex\Zowner\Application\Features\HasValidations;
use App\Ahex\Entrada\Application\IndexCalled\FilteredPresenter;
use App\Ahex\Entrada\Application\EditCalled\EditorsContainer;
use App\Ahex\Entrada\Application\StoreCalled\Redirector;
use App\Ahex\Entrada\Application\ShowCalled\ShowPresenter;
use App\Ahex\Entrada\Application\UpdateCalled\Updaters\UpdatersContainer;
use App\Ahex\Entrada\Application\UpdateMultipleCalled\UpdatersMultipleContainer;
use App\Ahex\GuiaImpresion\Infrastructure\PageDesigner\PageDesigner;
use App\Http\Middleware\Custom\GuiaImpresionActivada;
use App\Imports\EntradasImport;
use App\Imports\EntradasImport2;
use Maatwebsite\Excel\Facades\Excel;
use App\Consolidado;
use App\Cliente;
use App\GuiaImpresion;
use App\Entrada;
use App\Etapa;


class EntradaController extends Controller
{
    use HasValidations;

    public function __construct()
    {
        $this->middleware(GuiaImpresionActivada::class)->only(['toPrint','toPrintMultiple']);
    }

    public function index(Request $request)
    {
        return view('entradas.index', [
            'entradas' => Entrada::withIndex()->filterByRequest($request)->getFiltered(),
            'filtered' => new FilteredPresenter($request),
        ]);
    }

    public function create(CreateRequest $request)
    {   
        $consolidado = $request->has('consolidado') ? Consolidado::find($request->consolidado) : false;

        return view('entradas.create', [
            'clientes' => $consolidado ?: Cliente::all(),
            'consolidado' => $consolidado,
            'route_cancel' => $consolidado ? route('consolidados.show', $consolidado) : route('entradas.index'),
            'entrada' => new Entrada,
        ]);
    }

    public function store(StoreRequest $request)
    {
        $prepared = Entrada::prepare( $request->validated() );

        if(! $entrada = Entrada::create($prepared) )
            return back()->with('failure', 'Error al guardar la nueva entrada');

        $redirector = new Redirector($entrada);
        return redirect( $redirector->route($request->siguiente) )
                ->onlyInput( $redirector->feedback() )
                ->with('success', "Entrada {$entrada->numero} guardada");
    }

    public function show(Entrada $entrada, string $show = null)
    {
        return view('entradas.show', [
            'entrada' => $entrada,
            'presenter' => new ShowPresenter($entrada, $show),
        ]);
    }

    public function edit(Entrada $entrada, EditRequest $request)
    {
        $editor = EditorsContainer::get($entrada, $request);
        return view($editor->template(), $editor->data());
    }

    public function update(Entrada $entrada, UpdateRequest $request)
    {
        $updater = UpdatersContainer::get($request, $entrada);
        
        if(! $entrada->fill( $updater->prepare() )->save() )
            return back()->with('failure', $updater->failure());

        return back()->with('success', $updater->success());
    }

    public function destroy(Entrada $entrada)
    {
        if(! $entrada->delete() )
            return back()->with('failure', 'Error al eliminar entrada');
        
        $route = $entrada->hasConsolidado()
                ? route('consolidados.show', $entrada->consolidado_id)
                : route('entradas.index');

        return redirect($route)->with('success', "Entrada con número <b>{$entrada->numero}</b> eliminada");
    }


    //  MULTIPLE

    public function importMultiple(ImportRequest $request)
    {
        $entradas_import = new EntradasImport([
            'cliente' => $request->has('import_entradas_consolidado') ? Consolidado::find($request->import_entradas_consolidado)->cliente_id : $request->import_entradas_cliente,
            'consolidado' => $request->get('import_entradas_consolidado'),
            'etapa' => $request->get('import_entradas_etapa'),
        ]);

        $entradas_import->import($request->file('import_entradas'));

        if( $entradas_import->failureRowsCount() === 0 )
            return back()->with('success', "Se importó las <b>{$entradas_import->rowsCount()} filas</b> del CSV en entradas</b>");

        foreach($entradas_import->failureRows() as $row => $column)
            $errors[] = "<li>{$row}: {$column}</li>";

        $list = implode('', $errors);

        return back()->with('warning', "Se importó de <b>{$entradas_import->rowsCount()} filas</b> / <b>{$entradas_import->successRowsCount()} entradas</b> <br> <small>Revisar fila: columna</small><ul>{$list}</ul>"); 
    }

    public function updateMultiple(MultipleRequest $request)
    {
        if(! $updater = UpdatersMultipleContainer::get( $request->all() ) )
            return back()->with('failure', 'Editor no válido para actualizar la selección de entradas');

        if(! $updater->validate() )
            return back()->with('failure', $updater->invalid_message);

        $entradas_updated = $updater->update($request->entradas);
        $entradas_count = count($request->entradas);

        return back()->with('success', "Se actualizó <em>{$updater->name}</em> de <b>{$entradas_count} filas</b> / <b>{$entradas_updated} entradas</b>");
    }

    public function destroyMultiple(MultipleRequest $request)
    {
        if(! ($entradas_deleted = Entrada::destroy($request->entradas)) <> false )
            return back()->with('failure', 'Error al eliminar la selección de entradas');
        
        $entradas_count = count($request->entradas);
        
        return back()->with('success', "Se eliminó de <b>{$entradas_count} filas</b> / <b>{$entradas_deleted} entradas</b>");        
    }


    // TO PRINT

    public function toPrint(Entrada $entrada, GuiaImpresion $guia = null)
    {
        if(! is_a($guia, GuiaImpresion::class) ) 
            return view('entradas.print.single')->with('entrada', $entrada);

        $guia->incrementarIntentosImpresion();

        return view('guias_impresion.print.single', [
            'entrada' => $entrada,
            'page' => new PageDesigner($guia),
        ]);
    }

    public function toPrintMultiple(MultipleRequest $request, GuiaImpresion $guia = null)
    {
        $entradas = Entrada::withRelations()->whereIn('id', $request->entradas)->get();

        if(! is_a($guia, GuiaImpresion::class) ) 
            return view('entradas.print.multiple', compact('entradas'));

        $guia->incrementarIntentosImpresion( $entradas->count() );

        return view('guias_impresion.print.multiple', [
            'entradas' => $entradas,
            'page' => new PageDesigner($guia),
        ]);
    }
}
