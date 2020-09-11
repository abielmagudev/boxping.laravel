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

        if( ! $consolidado = Storer::save( $validated ) )
            return back()->withInput()->with('failure', 'Error al guardar consolidado');

        $route = $this->routeAfterStore($request->input('save', 0), $consolidado->id);
        return redirect($route)->with('success', "Consolidado {$consolidado->numero} guardado");
    }

    public function show($id)
    {
        return view('consolidados.show', [
            'consolidado' => Consolidado::with(['entradas.destinatario'])->find($id),
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

    public function destroy(Request $request, Consolidado $consolidado)
    {
        $temp = (object) [
            'numero'   => $consolidado->numero,
            'entradas' => $consolidado->entradas->pluck('id')->all(),
        ];
        
        if( ! $consolidado->delete() )
            return back()->with('failure', 'Error al eliminar consolidado');
        
        Decoupler::entradas( $request->input('eliminar_entradas','no'), $temp->entradas );

        return view('consolidados.delete');

        return redirect()->route('consolidados.index')->with('success', "Consolidado {$temp->numero} eliminado");
    }
}
