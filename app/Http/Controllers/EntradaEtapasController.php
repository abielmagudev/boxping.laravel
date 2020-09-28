<?php

namespace App\Http\Controllers;

use App\Entrada;
use App\Etapa;
use App\EntradaEtapa;
use App\Http\Requests\EntradaEtapaSaveRequest as SaveRequest;
use App\Ahex\EntradaEtapa\Domain\FillingTrait as Filling;
use Illuminate\Http\Request;

class EntradaEtapasController extends Controller
{
    use Filling;

    public function create(Entrada $entrada)
    {
        $entrada_etapas_id = $entrada->etapas()->get()->pluck('id');

        return view('entradas.agregar.etapas.create', [
            'entrada' => $entrada,
            'etapa' => EntradaEtapa::nulo(),
            'etapas' => Etapa::whereNotIn('id', $entrada_etapas_id)->get(),
            'peso_options' => config('system.measures.peso'),
            'dimension_options' => config('system.measures.dimension'),
        ]);
    }

    public function store(SaveRequest $request, Entrada $entrada)
    {
        $data = $this->fill( $request->validated() );

        if( ! is_null($entrada->etapas()->attach($request->etapa, $data)) )
            return back()->withInput()->with('failure', 'Error al agregar etapa');
        
        return redirect()->route('entradas.show', $entrada)->with('success', 'Etapa agregada');
    }

    public function edit(Entrada $entrada, $id)
    {
        return view('entradas.agregar.etapas.edit', [
            'entrada' => $entrada,
            'etapa' => $entrada->etapas()->find($id),
            'peso_options' => config('system.measures.peso'),
            'dimension_options' => config('system.measures.dimension'),
        ]);
    }

    public function update(SaveRequest $request, Entrada $entrada, $id)
    {
        $data = $this->fill( $request->validated() );

        if( ! $entrada->etapas()->updateExistingPivot($id, $data) )
            return back()->with('failure', 'Error al actualizar etapa');
        
        return redirect()->route('entradas.show', $entrada)->with('success', 'Etapa actualizada');
    }

    public function destroy(Entrada $entrada, $id)
    {
        if( ! $entrada->etapas()->detach($id) )
            return back()->with('failure', 'Error al eliminar etapa');

        return redirect()->route('entradas.show', $entrada)->with('success', 'Etapa eliminada');
    }
}
