<?php

namespace App\Http\Controllers;

use App\Alerta;
use App\Entrada;
use App\EntradaEtapa;
use App\Etapa;
use App\Http\Requests\EntradaEtapaSaveRequest as SaveRequest;
use Illuminate\Http\Request;

class EntradaEtapaController extends Controller
{
    public function add(Entrada $entrada, Request $request)
    {
        $attached_etapas = $entrada->etapas->pluck('id');

        return view('entradas_etapas.add', [
            'alertas' => Alerta::orderBy('nombre', 'asc')->get(),
            'attached_alertas' => [],
            'entrada' => $entrada,
            'etapa' => $request->filled('slug') ? Etapa::findBySlug($request->slug) : new Etapa,
            'etapas' => Etapa::whereNotIn('id', $attached_etapas)->get(),
        ]);
    }

    public function store(Entrada $entrada, SaveRequest $request)
    {
        $prepared = EntradaEtapa::prepare($request->validated());

        if( ! is_null( $entrada->etapas()->attach($request->etapa, $prepared) ) )
            return back()->withInput()->with('failure', 'Error al agregar etapa');
        
        $etapa = $entrada->etapas()->find($request->etapa);
        return redirect()->route('entradas.show', $entrada)->with('success', "Etapa {$etapa->nombre} agregada");
    }

    public function edit(Entrada $entrada, $etapa)
    {
        $attached_etapa = $entrada->etapas()->findOrFail($etapa);

        return view('entradas_etapas.edit', [
            'attached_alertas' => json_decode($attached_etapa->entrada_etapa->alertas_id) ?? [],
            'alertas' => Alerta::orderBy('nombre','asc')->get(),
            'entrada' => $entrada,
            'etapa' => $attached_etapa,
        ]);
    }

    public function update(Entrada $entrada, $etapa, SaveRequest $request)
    {
        $prepared = EntradaEtapa::prepare($request->validated());
        
        if( ! $entrada->etapas()->updateExistingPivot($etapa, $prepared) )
            return back()->with('failure', 'Error al actualizar etapa');
        
        return back()->with('success', 'Etapa actualizada');
    }

    public function destroy(Entrada $entrada, Etapa $etapa)
    {
        if(! $entrada->etapas()->detach($etapa) )
            return back()->with('failure', 'Error al eliminar etapa');

        return redirect()->route('entradas.show', $entrada)->with('success', "Etapa {$etapa->nombre} eliminada");
    }
}
