<?php

namespace App\Http\Controllers;

use App\Consolidado;
use App\Entrada;
use App\Cliente;
use App\Ahex\Consolidado\Domain\Decoupler;
use App\Ahex\Consolidado\Application\HandlerTrait as Handler;
use App\Ahex\Consolidado\Application\StoreRouter;
use App\Http\Requests\ConsolidadoSaveRequest as SaveRequest;
use Illuminate\Http\Request;

class ConsolidadoController extends Controller
{
    use Handler;

    public function index()
    {
        return view('consolidados/index', [
            'consolidados' => Consolidado::with(['cliente','entradas'])->orderBy('id', 'desc')->paginate(),
            'consolidado_color' => (object) [
                'abierto' => config('system.consolidados.status.abierto.color'),
                'cerrado' => config('system.consolidados.status.cerrado.color'),
            ],
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
            'config_consolidados' => (object) config('system.consolidados'),
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
