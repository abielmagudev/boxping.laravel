<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntradaEtapaSaveRequest as SaveRequest;
use Illuminate\Http\Request;
use App\Alerta;
use App\Entrada;
use App\EntradaEtapa;
use App\Etapa;

class EntradaEtapaController extends Controller
{
    public function create(Entrada $entrada, Request $request)
    {
        return view('entradas_etapas.create', [
            'alertas' => Alerta::orderBy('nombre', 'asc')->get(),
            'alertas_attached' => [],
            'entrada' => $entrada,
            'etapa' => $request->filled('slug') ? Etapa::findBySlug($request->slug) : new Etapa,
            'etapas' => Etapa::whereNotIn('id', $entrada->etapas->pluck('id'))->get(),
        ]);
    }

    public function store(Entrada $entrada, SaveRequest $request)
    {
        $prepared = EntradaEtapa::prepare($request->validated());

        if( ! is_null( $entrada->etapas()->attach($request->etapa, $prepared) ) )
            return back()->withInput()->with('failure', 'Error al agregar etapa para la entrada');
        
        $etapa = $entrada->etapas()->find($request->etapa);
        return redirect()->route('entradas.show', [$entrada,'etapas'])->with('success', "Etapa {$etapa->nombre} guardada a la entrada");
    }

    public function edit(Entrada $entrada, $etapa)
    {
        $etapa_attached = $entrada->etapas()->findOrFail($etapa);

        return view('entradas_etapas.edit', [
            'alertas' => Alerta::orderBy('nombre','asc')->get(),
            'alertas_attached' => json_decode($etapa_attached->entrada_etapa->alertas_id) ?? [],
            'entrada' => $entrada,
            'etapa' => $etapa_attached,
        ]);
    }

    /**
     * Para guardar cambios en la etapa de la entrada se utlizaba:
     * $entrada->etapas()->updateExistingPivot($etapa, $prepared) 
     * pero no retorna boleano en caso de éxito ó no la actualización, solo retorna integer
     * 
     * Se refactorizó a modelo(pivot) Eloquent para tener disponible los siguientes métodos
     * que retornan boleano como resultado de su acción:
     * isClean(), isDirty(), wasChanged() y fill()->save()
     *
     * @param Entrada $entrada
     * @param SaveRequest $request
     * @return void
     */
    public function update(Entrada $entrada, SaveRequest $request)
    {
        $prepared = EntradaEtapa::prepare($request->validated());
        $pivot = $entrada->etapas->find($request->etapa)->entrada_etapa;
        
        if( ! $pivot->fill($prepared)->save() ) 
            return back()->with('failure', 'Error al actualizar etapa');
        
        return back()->with('success', 'Etapa actualizada');
    }

    public function destroy(Entrada $entrada, Etapa $etapa)
    {
        if(! $entrada->etapas()->detach($etapa) )
            return back()->with('failure', 'Error al eliminar etapa');

        return redirect()->route('entradas.show', [$entrada,'etapas'])->with('success', "Etapa {$etapa->nombre} eliminada de la entrada");
    }
}
