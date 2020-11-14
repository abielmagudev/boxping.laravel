<?php

namespace App\Http\Controllers;

use App\Conductor;
use App\Entrada;
use App\Http\Requests\ConductorSaveRequest as SaveRequest;
use Illuminate\Http\Request;

class ConductorController extends Controller
{
    public function index()
    {
        return view('conductores.index')->with('conductores', Conductor::all()->sortByDesc('id'));
    }

    public function create()
    {
        return view('conductores.create')->with('conductor', new Conductor);
    }

    public function store(SaveRequest $request)
    {
        $prepared = Conductor::prepare( $request->validated() );

        if(! $conductor = Conductor::create($prepared) )
            return back()->with('failure', 'Error al guardar conductor');

        return redirect()->route('conductores.index')->with('success', 'Conductor guardado');
    }

    public function show(Conductor $conductor)
    {
        $entradas = Entrada::with(['destinatario'])->where('conductor_id', $conductor->id)->get();
        
        return view('conductores.show', [
            'conductor' => $conductor,
            'entradas' => $entradas,
        ]);
    }

    public function edit(Conductor $conductor)
    {
        return view('conductores.edit')->with('conductor', $conductor);
    }

    public function update(SaveRequest $request, Conductor $conductor)
    {
        $prepared = Conductor::prepare( $request->validated() );

        if(! $conductor->fill($prepared)->save() )
            return back()->with('failure', 'Error al actualizar conductor');

        return back()->with('success', 'Conductor actualizado');
    }

    public function destroy(Conductor $conductor)
    {
        if(! $conductor->delete() )
            return back()->with('failure', 'Error al eliminar conductor');

        return redirect()->route('conductores.index')->with('success', "{$conductor->nombre} eliminado");
    }
}
