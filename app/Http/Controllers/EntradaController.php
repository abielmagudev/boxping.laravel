<?php

namespace App\Http\Controllers;

use App\Ahex\Zowner\Application\Features\HasValidations;
use App\Ahex\Entrada\Application\EditCalled\EditorsContainer;
use App\Ahex\Entrada\Application\RedirectAfterStored;
use App\Ahex\Entrada\Application\ShowPresenter;
use App\Ahex\Entrada\Application\UpdateCalled\Updaters\UpdatersContainer;
use App\Ahex\Entrada\Application\UpdateMultipleCalled\UpdatersMultipleContainer;
use App\Http\Requests\Entrada\CreateRequest;
use App\Http\Requests\Entrada\EditRequest;
use App\Http\Requests\Entrada\MultipleRequest;
use App\Http\Requests\Entrada\StoreRequest;
use App\Http\Requests\Entrada\UpdateRequest;
use Illuminate\Http\Request;
use App\Ahex\GuiaImpresion\Infrastructure\PageDesigner\PageDesigner;
use App\Consolidado;
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
        return view('entradas.create', [
            'entrada' => new Entrada,
            'clientes' => $request->has('consolidado') ?: \App\Cliente::all(),
            'consolidado' => $request->has('consolidado') ? Consolidado::findOrFail($request->consolidado) : false,
            'route_cancel' => $request->has('consolidado') ? route('consolidados.show', $request->consolidado) : route('entradas.index'),
        ]);
    }

    public function store(StoreRequest $request)
    {
        $prepared = Entrada::prepare( $request->validated() );

        if(! $entrada = Entrada::create($prepared) )
            return back()->with('failure', 'Error al guardar entrada');

        $redirect = RedirectAfterStored::next($entrada, $request->siguiente);
        return $redirect->with('success', "{$entrada->numero} guardada");
    }

    public function show(Entrada $entrada, Request $request)
    {
        return view('entradas.show', [
            'entrada' => $entrada,
            'presenter' => new ShowPresenter($entrada, $request),
        ]);
    }

    public function edit(Entrada $entrada, EditRequest $request)
    {
        $editor = EditorsContainer::editor($request, $entrada);
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

        return redirect($route)->with('success', "{$entrada->numero} eliminada");
    }


    //  MULTIPLE

    public function updateMultiple(MultipleRequest $request)
    {
        if(! $updater = UpdatersMultipleContainer::get( $request->all() ) )
            return back()->with('failure', 'Editor no válido para actualizar la selección de entradas');

        if(! $updater->validate() )
            return back()->with('failure', $updater->invalid_message);

        $entradas_updated = $updater->update($request->entradas);
        $entradas_count = count($request->entradas);

        return back()->with('success', "Actualización de {$updater->name} de {$entradas_count} / {$entradas_updated} entradas");
    }

    public function destroyMultiple(MultipleRequest $request)
    {
        if(! ($entradas_deleted = Entrada::destroy($request->entradas)) <> false )
            return back()->with('failure', 'Error al eliminar la selección de entradas');
        
        $entradas_count = count($request->entradas);
        
        return back()->with('success', "Eliminación de {$entradas_count} / {$entradas_deleted} entradas");        
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
