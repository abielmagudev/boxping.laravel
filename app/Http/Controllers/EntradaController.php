<?php

namespace App\Http\Controllers;

use App\Entrada;
use App\Cliente;
use App\Ahex\Entrada\Application\AgregarDestinatarioTrait as AgregarDestinatario;
use App\Ahex\Entrada\Application\AgregarRemitenteTrait as AgregarRemitente;
use App\Ahex\Entrada\Application\RoutesTrait as Routes;
use App\Ahex\Entrada\Application\CastViewCreate;
use App\Ahex\Entrada\Application\CastViewEdit;
use App\Ahex\Entrada\Application\Storer;

use App\Ahex\Entrada\Application\Edit\EditorFactory;
use App\Ahex\Entrada\Application\Update\UpdaterFactory;
// use App\Ahex\Entrada\Application\BelongsConsolidadoTrait as BelongsConsolidado;
// use App\Ahex\Zkeleton\Application\RoutingInterface as Routing;

use App\Http\Requests\EntradaCreateRequest as CreateRequest;
use App\Http\Requests\EntradaEditRequest as EditRequest;
use App\Http\Requests\EntradaStoreRequest as StoreRequest;
use App\Http\Requests\EntradaUpdateRequest as UpdateRequest;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    use AgregarRemitente, 
        AgregarDestinatario,
        Routes;

    public function index()
    {
        return view('entradas.index', [
            'entradas' => Entrada::with(['consolidado','cliente'])->orderBy('id','desc')->paginate(),
        ]);
    }

    public function create(CreateRequest $request)
    {   
        $consolidado_id = $request->input('consolidado', false);

        $cast = new CastViewCreate( $consolidado_id );

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
            'entrada' => Entrada::withMedidas()->withObservaciones()->find($id),
        ]);
    }

    public function edit(EditRequest $request, Entrada $entrada)
    {
        $form = $request->formulario;

        $cast = new CastViewEdit($form, $entrada);

        return view($cast->template, $cast->data);
    }

    public function update(UpdateRequest $request, Entrada $entrada)
    {
        $updater = UpdaterFactory::make($request->update, [
            'entrada' => $entrada,
            'request' => $request,
        ]);

        if( ! $updater->validate()->save() )
            return $updater->redirect( false );

        return $updater->redirect( true );
    }

    public function destroy(Entrada $entrada)
    {
        $route = $this->routeAfterDestroy($entrada->consolidado_id);
        
        if(! $entrada->delete() )
            return back()->with('failure', 'Error al eliminar entrada');
        
        return redirect($route)->with('success', 'Entrada eliminada');
    }
}
