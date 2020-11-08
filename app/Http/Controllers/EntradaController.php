<?php

namespace App\Http\Controllers;

use App\Entrada;
use App\Cliente;
use App\Comentario;
use App\EntradaEtapa;
use App\EntradaEtapaPivot;

use App\Ahex\Entrada\Application\CastSaveForm;
use App\Ahex\Entrada\Domain\UpdaterFactory;
use App\Ahex\Entrada\Application\RoutingTrait as Routing;
use App\Ahex\Entrada\Application\TrayectoriaTrait as Trayectoria;
use App\Http\Requests\EntradaCreateRequest as CreateRequest;
use App\Http\Requests\EntradaStoreRequest as StoreRequest;
use App\Http\Requests\EntradaEditRequest as EditRequest;
use App\Http\Requests\EntradaUpdateRequest as UpdateRequest;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    use Routing, Trayectoria;

    public function index()
    {
        return view('entradas.index', [
            'entradas' => Entrada::with(['consolidado','cliente'])->orderBy('id','desc')->paginate(),
        ]);
    }

    public function create(CreateRequest $request)
    {   
        $cast = CastSaveForm::create( $request->input('consolidado', false) );
        return view('entradas.create', $cast);
    }

    public function store(StoreRequest $request)
    {
        $prepared = Entrada::prepare($request->validated());

        if(! $entrada = Entrada::create($prepared) )
            return back()->with('failure', 'Error al guardar entrada');
        
        $route = $this->routeAfterStore($entrada->consolidado_id);
        return redirect($route)->with('success', "{$entrada->numero} guardada");
    }

    public function show(Entrada $entrada)
    {
        return view('entradas.show', [
            'entrada' => $entrada,
            'comentarios' => Comentario::where('entrada_id', $entrada->id)->orderBy('id', 'desc')->get(),
            'config_alertas' => config('system.alertas'),
        ]);
    }

    public function edit(EditRequest $request, Entrada $entrada)
    {
        $cast = CastSaveForm::edit($request->formulario, $entrada);
        return view('entradas.edit', $cast);
    }

    public function update(UpdateRequest $request, Entrada $entrada)
    {
        $updater = UpdaterFactory::make($request->actualizar, $entrada);
        $validated = $request->validate($updater->rules(), $updater->messages());
        $prepared = $updater->prepare($validated);
        
        if(! $entrada->fill($prepared)->save() )
            return back()->with('failure', $updater->notification(false));
        
        if(! $updater->redirect )
            return back()->with('success', $updater->notification());

        return redirect( $updater->redirect )->with('success', $updater->notification());
    }

    public function destroy(Entrada $entrada)
    {
        $route = $this->routeAfterDestroy($entrada->consolidado_id);

        if(! $entrada->delete() )
            return back()->with('failure', 'Error al eliminar entrada');
        
        return redirect($route)->with('success', "{$entrada->numero} eliminada");
    }
}
