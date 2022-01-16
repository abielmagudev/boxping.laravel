<?php

namespace App\Http\Controllers;

use App\Entrada;
use App\Salida;
use App\Incidente;
use App\Transportadora;
use App\Http\Requests\Salida\CreateRequest;
use App\Http\Requests\Salida\SaveRequest;
use Illuminate\Http\Request;

class SalidaController extends Controller
{
    public function index()
    {
        return view('salidas.index', [
            'salidas' => Salida::with(['transportadora','entrada.destinatario','incidentes'])->paginate(25)
        ]);
    }

    public function create(CreateRequest $request)
    {
        return view('salidas.create', [
            'entrada' => Entrada::find($request->entrada),
            'salida' => new Salida,
            'transportadoras' => Transportadora::all(),
            'incidentes' => Incidente::all(),
            'all_coberturas' => Salida::allCoberturasConDescripciones(),
        ]);
    }

    public function store(SaveRequest $request)
    {
        $prepared = Salida::prepare( $request->validated() );

        if(! $salida = Salida::create($prepared) )
            return back()->with('failure', 'Error al guardar la salida');

        return redirect()->route('entradas.show', $salida->entrada_id)->with('success','Salida guardada');
    }

    public function show(Salida $salida)
    {
        // return view('salidas.show')->with('salida', $salida);
        return redirect()->route('entradas.show', $salida->entrada_id);
    }

    public function edit(Salida $salida)
    {
        return view('salidas.edit', [
            'salida' => $salida,
            'transportadoras' => Transportadora::all(),
            'incidentes' => Incidente::all(),
            'all_coberturas' => Salida::allCoberturasConDescripciones(),
            'all_status' => Salida::allStatusConPropiedades(),
        ]);
    }

    public function update(SaveRequest $request, Salida $salida)
    {
        $prepared = Salida::prepare( $request->validated() );

        if( ! $salida->fill($prepared)->save() )
            return back()->with('failure', 'Error al actualizar salida');

        $salida->incidentes()->sync( $request->input('incidentes', []) );
        
        return back()->with('success', 'Salida actualizada');
    }

    public function destroy(Salida $salida)
    {
        if( ! $salida->delete() )
            return back()->with('failure', 'Error al eliminar salida');

        $rastreo = "con número de rastreo {$salida->rastreo}" ?? 'sin número de rastreo';
        return redirect()->route('entradas.show', $salida->entrada_id)->with('success', "Salida {$rastreo} eliminado");
    }
}
