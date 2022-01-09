<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Entrada\CreateRequest;
use App\Http\Requests\Entrada\StoreRequest;
use App\Http\Requests\Entrada\EditRequest;
use App\Http\Requests\Entrada\UpdateRequest;
use App\Http\Requests\Entrada\MultipleRequest;
use App\Ahex\Zowner\Application\Features\HasValidations;
use App\Ahex\Entrada\Application\RedirectAfterStored;
use App\Ahex\Entrada\Application\ShowPresenter;
use App\Ahex\Entrada\Application\EditCalled\EditorsContainer;
use App\Ahex\Entrada\Application\UpdateCalled\Updaters\UpdatersContainer;
use App\Entrada;
use App\Consolidado;
use App\GuiaImpresion;

class EntradaController extends Controller
{
    use HasValidations;

    public function index(Request $request)
    {
        $entradas = Entrada::with(['consolidado','cliente','destinatario'])
                            ->filterByRequest($request)
                            ->getFiltered();

        return view('entradas.index', [
            'entradas' => $entradas,
            'pagination' => ! $this->hasAnyPagination($entradas) ?: [
                'prev' => $entradas->previousPageUrl() ?? null,
                'next' => $entradas->nextPageUrl() ?? null,
            ],
        ]);
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

    public function destroyMany()
    {
        // code...
    }

    public function toPrint(Entrada $entrada, GuiaImpresion $guia = null)
    {
        $view_name = is_object($guia) && $guia->incrementarIntentosImpresion()
                    ? 'guias_impresion.print.single'
                    : 'entradas.print.single';
   
        return view($view_name, compact('entrada', 'guia'));
    }

    public function toPrintMany(MultipleRequest $request, GuiaImpresion $guia = null)
    {
        $entradas = Entrada::withRelations()->whereIn('id', $request->entradas)->get();

        $view_name = is_object($guia) && $guia->incrementarIntentosImpresion( $entradas->count() )
                    ? 'guias_impresion.print.multiple'
                    : 'entradas.print.multiple';
        
        return view($view_name, compact('entradas', 'guia'));
    }
}
