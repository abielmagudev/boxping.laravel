<?php

namespace App\Http\Controllers;

use App\Entrada;
use App\Etapa;
use App\EntradaEtapa;
use App\Alerta;
use App\Http\Requests\EntradaEtapaSaveRequest as SaveRequest;
use Illuminate\Http\Request;

class EntradaEtapasController extends Controller
{
    public function create(Request $request, Entrada $entrada)
    {
        $etapa = $request->filled('slug') ? Etapa::slug($request->slug) : new Etapa;
        $etapas_attached = $entrada->etapas()->get(['id'])->pluck('id');

        return view('entradas.etapas.create', [
            'entrada' => $entrada,
            'etapa' => $etapa,
            'etapas' => Etapa::whereNotIn('id', $etapas_attached)->get(),
            'alertas' => Alerta::orderBy('nombre', 'desc')->get(),
            'alertas_attached' => array(),
            'medidas_peso' => config('system.medidas.peso'),
            'medidas_volumen' => config('system.medidas.volumen'),
        ]);
    }

    public function store(SaveRequest $request, Entrada $entrada)
    {
        $prepared = EntradaEtapa::prepare($request->validated());

        if(! is_null( $entrada->etapas()->attach($request->etapa, $prepared) ) )
            return back()->withInput()->with('failure', 'Error al agregar etapa');

        return redirect()->route('entradas.show', $entrada)->with('success', 'Etapa agregada');
    }

    public function edit(Entrada $entrada, $etapa)
    {
        $etapa_attached = $entrada->etapas()->findOrFail($etapa);

        return view('entradas.etapas.edit', [
            'entrada' => $entrada,
            'etapa' => $etapa_attached,
            'alertas' => Alerta::orderBy('nombre', 'desc')->get(),
            'alertas_attached' => json_decode($etapa_attached->pivot->alertas_id) ?? [],
            'medidas_peso' => config('system.medidas.peso'),
            'medidas_volumen' => config('system.medidas.volumen'),
        ]);
    }

    public function update(SaveRequest $request, Entrada $entrada, $id)
    {
        $prepared = EntradaEtapa::prepare($request->validated());

        if(! $entrada->etapas()->updateExistingPivot($id, $prepared) )
            return back()->with('failure', 'Error al actualizar etapa');
        
        return redirect()->route('entradas.show', $entrada)->with('success', 'Etapa actualizada');
    }

    public function destroy(Entrada $entrada, Etapa $etapa)
    {
        if(! $entrada->etapas()->detach($etapa) )
            return back()->with('failure', 'Error al eliminar etapa');

        return redirect()->route('entradas.show', $entrada)->with('success', "{$etapa->nombre} eliminada");
    }
}
