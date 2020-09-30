<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Entrada;

use App\Ahex\Entrada\Application\CastViewCreate;
use App\Ahex\Entrada\Application\CastViewEdit;
use App\Ahex\Entrada\Application\TrayectoriaTrait as Trayectoria;
use App\Ahex\Entrada\Application\RoutesTrait as Routes;
use App\Ahex\Entrada\Domain\Storer;
use App\Ahex\Entrada\Domain\UpdaterFactory;
use App\Http\Requests\EntradaCreateRequest as CreateRequest;
use App\Http\Requests\EntradaStoreRequest as StoreRequest;
use App\Http\Requests\EntradaEditRequest as EditRequest;
use App\Http\Requests\EntradaUpdateRequest as UpdateRequest;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    use Trayectoria, Routes;

    public function index()
    {
        return view('entradas.index', [
            'entradas' => Entrada::with(['consolidado','cliente'])->orderBy('id','desc')->paginate(),
        ]);
    }

    public function create(CreateRequest $request)
    {   
        $cast = new CastViewCreate( $request->input('consolidado', false) );
        return view($cast->template, $cast->data);
    }

    public function store(StoreRequest $request)
    {
        $validated = (object) $request->validated();

        if( ! $entrada = Storer::save( $validated ) )
            return back()->with('failure', 'Error al guardar entrada');
        
        $route = $this->routeAfterStore( $entrada->consolidado_id );
        return redirect($route)->with('success', "Entrada {$entrada->numero} guardada");
    }

    public function show($id)
    {
        return view('entradas.show', [
            'entrada' => Entrada::conEtapas()->withObservaciones()->findOrFail($id),
        ]);
    }

    public function edit(EditRequest $request, Entrada $entrada)
    {
        $cast = new CastViewEdit($request->formulario, $entrada);
        return view($cast->template, $cast->data);
    }

    public function update(UpdateRequest $request, Entrada $entrada)
    {
        $updater = UpdaterFactory::make($request->actualizar, [
            $request,
            $entrada,
        ]);
        
        if( ! $updater->save() )
            return back()->with('failure', $updater->message(false));
        
        if( ! isset($updater->redirect) )
            return back()->with('success', $updater->message(true));

        return redirect( $updater->redirect )->with('success', $updater->message(true));
    }

    public function destroy(Entrada $entrada)
    {
        $route = $this->routeAfterDestroy($entrada->consolidado_id);
        $numero = $entrada->numero;

        if( ! $entrada->delete() )
            return back()->with('failure', 'Error al eliminar entrada');
        
        return redirect($route)->with('success', "Entrada {$numero} eliminada");
    }
}
