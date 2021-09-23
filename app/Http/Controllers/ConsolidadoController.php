<?php

namespace App\Http\Controllers;

use App\Consolidado;
use App\Entrada;
use App\Cliente;
use App\Ahex\Consolidado\Application\StoreRouter;
use App\Http\Requests\ConsolidadoSaveRequest as SaveRequest;
use Illuminate\Http\Request;

class ConsolidadoController extends Controller
{
    public function index()
    {
        return view('consolidados/index', [
            'consolidados' => Consolidado::with(['cliente','entradas'])->orderBy('id', 'desc')->paginate(),
            'all_status' => Consolidado::getAllStatus(),
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
        
        $route = StoreRouter::get($request->guardar, $consolidado->id);
        return redirect($route)->with('success', "Consolidado {$consolidado->numero} guardado");
    }

    public function show(Consolidado $consolidado, Request $request)
    {
        $entradas = Entrada::with(['cliente','destinatario'])
                            ->where('consolidado_id', $consolidado->id)
                            ->filterByRequest($request->all())
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
            'consolidado' => $consolidado,
            'clientes' => Cliente::all(['id','nombre','alias']),
            'all_status' => Consolidado::getAllStatus(),
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
        
        $consolidado->uncoupleEntradas( $request->has('eliminar_entradas') );

        return redirect()->route('consolidados.index')->with('success', "Consolidado {$consolidado->numero} eliminado");
    }

    public function printing(Consolidado $consolidado)
    {
        $entradas_salidas = $consolidado->entradas()->with('salida')->has('salida')->get();

        $counters = (object) [
            'pendientes' => $consolidado->entradas->whereNull('importado_fecha')->count(),
            'registradas' => $consolidado->entradas->whereNotNull('importado_fecha')->count(),
            'entregadas' => $entradas_salidas->where('salida.status', 'entregado')->count(),
            'total' => $consolidado->entradas->count(),
        ];

        return view('consolidados.print', [
            'cliente' => $consolidado->cliente ?? new Cliente,
            'consolidado' => $consolidado,
            'entradas' => $counters,
        ]);
    }
}
