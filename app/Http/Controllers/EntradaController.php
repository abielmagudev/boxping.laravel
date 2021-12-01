<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EntradaCreateRequest as CreateRequest;
use App\Http\Requests\EntradaStoreRequest as StoreRequest;
use App\Http\Requests\EntradaEditRequest as EditRequest;
use App\Http\Requests\EntradaUpdateRequest as UpdateRequest;
use App\Http\Requests\EntradaPrintManyRequest as PrintManyRequest;
use App\Ahex\Zowner\Application\HasValidations;
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

        $has_pagination = $this->hasPagination($entradas);

        return view('entradas.index', [
            'counter'    => $has_pagination ? $entradas->total() : $entradas->count(),
            'entradas'   => $has_pagination ? $entradas->getCollection() : $entradas,
            'pagination' => (object) [
                'available' => $has_pagination,
                'next' => ! $has_pagination ?: $entradas->nextPageUrl(),
                'prev' => ! $has_pagination ?: $entradas->previousPageUrl(), 
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
        $updater = UpdatersContainer::find($request->actualizar, $request->validated());
        
        if(! $entrada->fill( $updater->prepared() )->save() )
            return back()->with('failure', $updater->message('failure'));

        return redirect( $updater->route($entrada) )->with('success', $updater->message('success'));
    }

    public function destroy(Entrada $entrada)
    {
        if(! $entrada->delete() )
            return back()->with('failure', 'Error al eliminar entrada');
        
        $route = Consolidado::where('id', $entrada->consolidado_id)->exists()
                ? route('consolidados.show', $entrada->consolidado_id)
                : route('entradas.index');

        return redirect($route)->with('success', "{$entrada->numero} eliminada");
    }

    public function destroyMany()
    {
        // code...
    }

    public function toPrint(Entrada $entrada, GuiaImpresion $guia)
    {
        $guia->incrementarIntentos()->save();

        return view('entradas.print.single', [
            'entrada' => $entrada,
            'guia' => $guia,
        ]);
    }

    public function toPrintMany(PrintManyRequest $request)
    {
        $guia = GuiaImpresion::find($request->guia);        
        $guia->incrementarIntentos()->save();

        return view('entradas.print.multiple', [
            'entradas' => Entrada::withRelations()->whereIn('id', $request->entradas)->get(),
            'guia' => $guia,
        ]);
    }
}
