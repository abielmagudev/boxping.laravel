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
use App\Ahex\Entrada\Application\EditCalled\EditorsContainer;
use App\Ahex\Entrada\Application\StoreCalled\Redirector;
use App\Ahex\Entrada\Application\ShowCalled\ShowPresenter;
use App\Ahex\Entrada\Application\UpdateCalled\Updaters\UpdatersContainer;
use App\Ahex\Entrada\Application\UpdateMultipleCalled\UpdatersMultipleContainer;
use App\Ahex\GuiaImpresion\Infrastructure\PageDesigner\PageDesigner;
use App\Imports\EntradasImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Consolidado;
use App\Cliente;
use App\GuiaImpresion;
use App\Entrada;


class EntradaController extends Controller
{
    use HasValidations;

    public function index(Request $request)
    {
        $entradas = Entrada::with(['consolidado','cliente','destinatario'])
                            ->filterByRequest($request)
                            ->getFiltered();

        return view('entradas.index', compact('entradas'));
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
        $csv   = $request->file('import_entradas');
        $owner = $request->has('import_entradas_consolidado') 
                ? Consolidado::find($request->get('import_entradas_consolidado')) 
                : Cliente::find($request->get('import_entradas_cliente'));

        $entradasImport = new EntradasImport($owner);

        Excel::import($entradasImport, $csv);

        return back()->with('success', "Se importó de <b>{$entradasImport->getRowsTotal()} filas</b> / <b>{$entradasImport->getRowsSaved()} entradas</b>");
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

    public function print(Entrada $entrada, GuiaImpresion $guia = null)
    {
        if(! is_object($guia) ) 
            return view('entradas.print.single')->with('entrada', $entrada);

        return view('guias_impresion.print.single', [
            'entrada' => $entrada,
            'page' => new PageDesigner($guia),
        ]);
    }

    public function printMultiple(MultipleRequest $request, GuiaImpresion $guia = null)
    {
        $entradas = Entrada::withRelations()->whereIn('id', $request->entradas)->get();

        if(! is_object($guia) ) 
            return view('entradas.print.multiple', compact('entradas'));

        return view('guias_impresion.print.multiple', [
            'entradas' => $entradas,
            'page' => new PageDesigner($guia),
        ]);
    }
}
