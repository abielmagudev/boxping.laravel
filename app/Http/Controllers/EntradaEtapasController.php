<?php

namespace App\Http\Controllers;

use App\Entrada;
use App\Etapa;
use App\EntradaEtapa;
use App\Http\Requests\EntradaEtapaSaveRequest as SaveRequest;
use App\Ahex\EntradaEtapa\Application\FormCreateTrait as FormCreate;
use App\Ahex\EntradaEtapa\Domain\FillingTrait as Filling;
use Illuminate\Http\Request;

class EntradaEtapasController extends Controller
{
    use FormCreate, Filling;

    public function create(Request $request, Entrada $entrada)
    {
        return view('entradas.etapas.create', [
            'entrada' => $entrada,
            'etapa' => $this->etapaSelected($request),
            'etapas' => $this->etapasNotHaveEntrada( $entrada->etapas()->get() ),
            'medidas_peso' => config('system.measures.peso'),
            'medidas_volumen' => config('system.measures.volumen'),
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
        return view('entradas.etapas.edit', [
            'entrada' => $entrada,
            'etapa' => $entrada->etapas()->find($id),
            'medidas_peso' => config('system.measures.peso'),
            'medidas_volumen' => config('system.measures.volumen'),
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
