<?php

namespace App\Http\Controllers;

use App\Consolidado;
use App\Cliente;
use App\Ahex\Consolidado\Domain\Decoupler;
use App\Ahex\Consolidado\Application\RoutingTrait as Routing;
use App\Ahex\Consolidado\Application\HandlerTrait as Handler;
use App\Http\Requests\ConsolidadoSaveRequest as SaveRequest;
use Illuminate\Http\Request;

class ConsolidadoController extends Controller
{
    use Routing, Handler;

    public function index()
    {
        $consolidados = Consolidado::with(['cliente','entradas'])->orderBy('id', 'desc')->paginate();

        return view('consolidados/index', [
            'consolidados' => $consolidados,
            'config_consolidados' => (object) config('system.consolidados'),
        ]);
    }

    public function create()
    {
        return view('consolidados.create', [
            'consolidado' => new Consolidado,
            'clientes' => Cliente::all(['id','nombre','alias']),
        ]);
    }

    public function store(SaveRequest $request)
    {       
        $prepared = Consolidado::prepare($request->validated());
        
        if( ! $consolidado = Consolidado::create($prepared) )
            return back()->with('failure', 'Error al guardar consolidado');
        
        $route = $this->routeAfterStore($request->input('guardar', 0), $consolidado->id);
        return redirect($route)->with('success', "Consolidado {$consolidado->numero} guardado");
    }

    public function show($id)
    {
        $consolidado = Consolidado::with(['entradas.destinatario'])->findOrFail($id);

        return view('consolidados.show', [
            'consolidado' => $consolidado,
            'config_consolidados' => (object) config('system.consolidados'),
        ]);
    }

    public function edit(Consolidado $consolidado)
    {
        return view('consolidados.edit', [
            'consolidado' => $consolidado,
            'clientes' => Cliente::all(['id','nombre','alias']),
        ]);
    }

    public function update(SaveRequest $request, Consolidado $consolidado)
    {
        $prepared = Consolidado::prepare( $request->validated() );

        if( ! $consolidado->fill($prepared)->save() )
            return back()->with('failure', 'Error al actualizar consolidado');

        $this->updateEntradas($consolidado);

        return back()->with('success', 'Consolidado actualizado');
    }

    public function destroy(Consolidado $consolidado)
    {   
        if(! $consolidado->delete() )
            return back()->with('failure', 'Error al eliminar consolidado');
        
        if( $consolidado->entradas->count() )
            $this->uncoupleEntradas($consolidado->id);

        return redirect()->route('consolidados.index')->with('success', "{$consolidado->numero} eliminado");
    }
}
