<?php

namespace App\Http\Controllers;

use App\Consolidado;
use App\Cliente;
use App\Ahex\Consolidado\Domain\Storer;
use App\Ahex\Consolidado\Domain\Updater;
use App\Ahex\Consolidado\Domain\Decoupler;
use App\Ahex\Consolidado\Application\RoutesTrait as Routes;
use App\Http\Requests\ConsolidadoSaveRequest as SaveRequest;
use Illuminate\Http\Request;

class ConsolidadoController extends Controller
{
    use Routes;

    public function index()
    {
        return view('consolidados/index', [
            'consolidados' => Consolidado::with(['cliente','entradas'])->orderBy('id', 'desc')->get(),
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
        $validated = (object) $request->validated();
        $option    = $request->input('guardar', 0);

        if( ! $consolidado = Storer::save( $validated ) )
            return back()->with('failure', 'Error al guardar consolidado');

        $route = $this->routeAfterStore($option, $consolidado->id);
        return redirect($route)->with('success', "Consolidado {$consolidado->numero} guardado");
    }

    public function show($id)
    {
        $consolidado = Consolidado::with(['entradas.destinatario'])->findOrFail($id);

        return view('consolidados.show', [
            'consolidado' => $consolidado,
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
        $validated = (object) $request->validated();

        if( ! Updater::save( $validated, $consolidado ) )
            return back()->with('failure', 'Error al actualizar consolidado');

        return back()->with('success', 'Consolidado actualizado');
    }

    public function destroy(Consolidado $consolidado)
    {
        $eliminar_entradas    = request('eliminar_entradas', 'no');
        $consolidado_entradas = $consolidado->entradas->pluck('id')->all();
        $consolidado_numero   = $consolidado->numero;
        
        if( ! $consolidado->delete() )
            return back()->with('failure', 'Error al eliminar consolidado');
        
        Decoupler::entradas($eliminar_entradas, $consolidado_entradas);

        return redirect()->route('consolidados.index')->with('success', "Consolidado {$consolidado_numero} eliminado");
    }
}
