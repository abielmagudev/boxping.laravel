<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ConsolidadoSaveRequest as SaveRequest;
use App\Ahex\Consolidado\Application\StoreCalled\Redirector;
use App\Cliente;
use App\Consolidado;
use App\Entrada;

class ConsolidadoController extends Controller
{
    public function index()
    {   
        $consolidados = Consolidado::with(['cliente'])
                        ->withCount(['entradas'])
                        ->orderBy('id', 'desc')
                        ->paginate(25);

        return view('consolidados/index', [
            'all_consolidados' => Consolidado::all(),
            'all_status' => Consolidado::allStatus(true),
            'consolidados' => $consolidados,
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
        
        if(! $consolidado = Consolidado::create($prepared) )
            return back()->with('failure', 'Error al guardar consolidado');
        
        return redirect( Redirector::route($request->guardar, $consolidado) )
                ->with('success', "Consolidado {$consolidado->numero} guardado");
    }

    public function show(Consolidado $consolidado, Request $request)
    {
        $entradas = Entrada::with(['destinatario'])
                            ->where('consolidado_id', $consolidado->id)
                            ->filterByRequest($request)
                            ->orderByDesc('id')
                            ->get();

        return view('consolidados.show', [
            'consolidado' => $consolidado,
            'entradas' => $entradas,
        ]);
    }

    public function edit(Consolidado $consolidado)
    {
        return view('consolidados.edit', [
            'all_status' => Consolidado::allStatus(),
            'clientes' => Cliente::all(['id','nombre','alias']),
            'consolidado' => $consolidado,
        ]);
    }

    public function update(SaveRequest $request, Consolidado $consolidado)
    {
        $prepared = Consolidado::prepare( $request->validated() );

        if( ! $consolidado->fill($prepared)->save() )
            return back()->with('failure', 'Error al actualizar consolidado');

        $consolidado->updateEntradas();

        return back()->with('success', 'Consolidado actualizado');
    }

    public function destroy(Consolidado $consolidado, Request $request)
    {   
        if(! $consolidado->delete() )
            return back()->with('failure', 'Error al eliminar consolidado');
        
        $eliminar_entradas = $request->get('eliminar_entradas', 'no') === 'yes';
        $consolidado->unbindEntradas( $eliminar_entradas );

        return redirect()->route('consolidados.index')->with('success', "Consolidado {$consolidado->numero} eliminado");
    }

    /**
     * Configuracion para impresión del consolidado
     *
     * $entradas = $consolidado->entradas()->with('salida')->has('salida')->get();
     * @param Consolidado $consolidado
     * @return void
     */
    public function toPrint(Consolidado $consolidado)
    {
        $entradas = $consolidado->entradas()->with('salida')->get();

        $counters = (object) [
            'entregadas' => $entradas->where('salida.status', 'entregado')->count(),
            'pendientes' => $entradas->whereNull('importado_fecha')->count(),
            'registradas' => $entradas->whereNotNull('importado_fecha')->count(),
            'total' => $entradas->count(),
        ];

        return view('consolidados.print', [
            'cliente' => $consolidado->cliente ?? new Cliente,
            'consolidado' => $consolidado,
            'entradas' => $counters,
        ]);
    }
}
