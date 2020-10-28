<?php

namespace App\Http\Controllers;

use App\Entrada;
use App\Etapa;
use App\EntradaEtapa;
use App\Alerta;
use App\Http\Requests\EntradaEtapaSaveRequest as SaveRequest;
use App\Ahex\EntradaEtapa\Application\FormCreateTrait as FormCreate;
use App\Ahex\EntradaEtapa\Domain\FillingTrait as Filling;
use Illuminate\Http\Request;

class EntradaEtapasController extends Controller
{
    use Filling;

    public function create(Request $request, Entrada $entrada)
    {
        $etapa_slug = $request->input('slug', null);
        $entrada_etapas_id = $entrada->etapas()->get()->pluck('id');

        return view('entradas.etapas.create', [
            'alertas' => Alerta::orderBy('nombre', 'desc')->get(),
            'entrada' => $entrada,
            'etapa' => Etapa::where('slug', $etapa_slug)->first(),
            'etapas' => Etapa::whereNotIn('id', $entrada_etapas_id)->get(),
            'medidas_peso' => config('system.measures.peso'),
            'medidas_volumen' => config('system.measures.volumen'),
            'alertas_attached' => [],
        ]);
    }

    public function store(SaveRequest $request, Entrada $entrada)
    {
        $data = $this->fill( $request->validated() );

        if( ! is_null($entrada->etapas()->attach($request->etapa, $data)) )
            return back()->withInput()->with('failure', 'Error al agregar etapa');

        return redirect()->route('entradas.show', $entrada)->with('success', 'Etapa agregada');
    }

    public function edit(Entrada $entrada, $etapa)
    {
        $etapa_attached = $entrada->etapas()->find($etapa);

        return view('entradas.etapas.edit', [
            'alertas' => Alerta::orderBy('nombre', 'desc')->get(),
            'entrada' => $entrada,
            'etapa' => $etapa_attached,
            'medidas_peso' => config('system.medidas.peso'),
            'medidas_volumen' => config('system.medidas.volumen'),
            'alertas_attached' => json_decode($etapa_attached->pivot->alertas_id) ?? [],
        ]);
    }

    public function update(SaveRequest $request, Entrada $entrada, $id)
    {
        $data = $this->fill( $request->validated() );

        if( ! $entrada->etapas()->updateExistingPivot($id, $data) )
            return back()->with('failure', 'Error al actualizar etapa');
        
        return redirect()->route('entradas.show', $entrada)->with('success', 'Etapa actualizada');
    }

    public function destroy(Entrada $entrada, $etapa)
    {
        if( ! $entrada->etapas()->detach($etapa) )
            return back()->with('failure', 'Error al eliminar etapa');

        return redirect()->route('entradas.show', $entrada)->with('success', 'Etapa eliminada');
    }
}
