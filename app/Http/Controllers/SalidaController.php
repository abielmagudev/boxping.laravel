<?php

namespace App\Http\Controllers;

use App\Entrada;
use App\Salida;
use App\Incidente;
use App\Transportadora;
use App\Http\Requests\SalidaCreateRequest as CreateRequest;
use App\Http\Requests\SalidaSaveRequest as SaveRequest;
use Illuminate\Http\Request;

class SalidaController extends Controller
{
    public function index()
    {
        return view('salidas.index', [
            'salidas' => Salida::with(['transportadora','entrada.destinatario','incidentes'])->get()->sortByDesc('id'),
            'config_cobertura' => config('system.salidas.cobertura'),
            'config_status'    => config('system.salidas.status'),
        ]);
    }

    public function create(CreateRequest $request)
    {
        return view('salidas.create', [
            'entrada'          => Entrada::find($request->entrada),
            'salida'           => new Salida,
            'transportadoras'  => Transportadora::all(),
            'incidentes'       => Incidente::all(),
            'config_cobertura' => config('system.salidas.cobertura'),
        ]);
    }

    public function store(SaveRequest $request)
    {
        $prepared = Salida::prepare( $request->validated() );

        if(! $salida = Salida::create($prepared) )
            return back()->with('failure', 'Error al guardar salida');

        // if( $request->has('incidentes') )
        //     $salida->incidentes()->sync( $request->incidentes );

        return redirect()->route('salidas.index')->with('success','Salida guardada');
    }

    public function show(Salida $salida)
    {
        return view('salidas.show')->with('salida', $salida);
    }

    public function edit(Salida $salida)
    {
        return view('salidas.edit', [
            'salida'          => $salida,
            'transportadoras' => Transportadora::all(),
            'incidentes'      => Incidente::all(),
            'config_cobertura' => config('system.salidas.cobertura'),
            'config_status'   => config('system.salidas.status'),
        ]);
    }

    public function update(SaveRequest $request, Salida $salida)
    {
        $prepared = Salida::prepare( $request->validated() );

        if( ! $salida->fill($prepared)->save() )
            return back()->with('failure', 'Error al actualizar salida');

        if( $request->has('incidentes') )
            $salida->incidentes()->sync( $request->incidentes );
        
            return back()->with('success', 'Salida actualizada');
    }

    public function destroy(Salida $salida)
    {
        if( ! $salida->delete() )
            return back()->with('failure', 'Error al eliminar salida');

        $rastreo = $salida->rastreo ?? 'Salida sin rastreo';
        return redirect()->route('salidas.index')->with('success', "{$rastreo} eliminado");
    }
}
