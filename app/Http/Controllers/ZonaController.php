<?php

namespace App\Http\Controllers;

use App\Etapa;
use App\Zona;
use App\Http\Requests\ZonaSaveRequest as SaveRequest;
use Illuminate\Http\Request;

class ZonaController extends Controller
{
    public function create(Etapa $etapa)
    {
        return view('etapas.zonas.create', [
            'etapa' => $etapa,
            'zona' => new Zona,
        ]);
    }

    public function store(SaveRequest $request, Etapa $etapa)
    {
        $validated = array_merge(['etapa_id' => $etapa->id], $request->validated());

        if( ! Zona::create( $validated ) )
            return back()->with('failure', 'Error al guardar nueva zona');

        return redirect()->route('etapas.show', $etapa)->with('success', 'Zona guardada');
    }

    public function edit(Etapa $etapa, Zona $zona)
    {
        return view('etapas.zonas.edit', [
            'etapa' => $etapa,
            'zona' => $zona,
        ]);
    }

    public function update(SaveRequest $request, Etapa $etapa, Zona $zona)
    {
        if( ! $zona->fill( $request->validated() )->save() )
            return back()->with('failure', 'Error al actualizar zona');
        
        return back()->with('success', 'Zona actualizada');
    }

    public function destroy(Etapa $etapa, Zona $zona)
    {
        $zona_nombre = $zona->nombre;

        if( ! $zona->delete() )
            return back()->with('failure', 'Error al eliminar zona');
        
        return redirect()->route('etapas.show', $etapa)->with('success', "Zona {$zona_nombre} eliminada");
    }
}
