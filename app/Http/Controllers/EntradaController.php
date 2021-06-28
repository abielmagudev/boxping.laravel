<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Comentario;
use App\Consolidado;
use App\Entrada;
use App\EntradaEtapa;
use App\EntradaEtapaPivot;

use App\Ahex\Entrada\Application\PrintingTrait as Printing;
use App\Ahex\Entrada\Application\Edit\Editors\EditorsContainer;
use App\Ahex\Entrada\Application\Store\Redirects\StoredRedirect;
use App\Ahex\Entrada\Application\Update\Updaters\UpdatersContainer;
use App\Http\Requests\EntradaCreateRequest as CreateRequest;
use App\Http\Requests\EntradaEditRequest as EditRequest;
use App\Http\Requests\EntradaStoreRequest as StoreRequest;
use App\Http\Requests\EntradaUpdateRequest as UpdateRequest;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    use Printing;

    public function index(Request $request)
    {
        $entradas = Entrada::with(['consolidado','cliente','destinatario'])
                    ->filterByRequest( $request->all() )
                    ->getFiltered( $request->input('muestreo', 25) );

        $has_pagination = hasPagination($entradas);

        return view('entradas.index', [
            'collection' => $entradas,
            'counter' => $has_pagination ? $entradas->total() : $entradas->count(),
            'entradas' => $has_pagination ? $entradas->getCollection() : $entradas,
            'has_pagination' => $has_pagination,
        ]);
    }

    public function create(CreateRequest $request)
    {   
        if( $consolidado = Consolidado::find($request->consolidado) )
            return view('entradas.create.consolidado', [
                'consolidado' => $consolidado,
                'entrada' => new Entrada,
            ]);

        return view('entradas.create.sin-consolidado', [
            'clientes' => Cliente::all(),
            'entrada' => new Entrada,
        ]);
    }

    public function store(StoreRequest $request)
    {
        $prepared = Entrada::prepare( $request->validated() );

        if( ! $entrada = Entrada::create($prepared) )
            return back()->with('failure', 'Error al guardar entrada');

        return StoredRedirect::hasConsolidado($entrada->consolidado_id)
                             ->redirect($request->siguiente)
                             ->with('success', "{$entrada->numero} guardada");
    }

    public function show(Entrada $entrada)
    {
        return view('entradas.show', [
            'comentarios' => Comentario::where('entrada_id', $entrada->id)->orderBy('id', 'desc')->get(),
            'config_alertas' => config('system.alertas'),
            'entrada' => $entrada,
        ]);
    }

    public function edit(EditRequest $request, Entrada $entrada)
    {
        $editor = EditorsContainer::get($request->editor, $entrada);

        return view($editor->template(), $editor->data());
    }

    public function update(UpdateRequest $request, Entrada $entrada)
    {
        $updater = UpdatersContainer::get($request, $entrada);
        
        if( ! $updater->save() )
            return $updater->redirect()->failure();

        return $updater->redirect()->success();
    }

    public function destroy(Entrada $entrada)
    {
        if( ! $entrada->delete() )
            return back()->with('failure', 'Error al eliminar entrada');
        
        $route = Consolidado::where('id', $entrada->consolidado_id)->exists()
                ? route('consolidados.show', $entrada->consolidado_id)
                : route('entradas.index');

        return redirect($route)->with('success', "{$entrada->numero} eliminada");
    }
}
