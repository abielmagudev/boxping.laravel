<?php

namespace App\Http\Controllers;

use App\Incidente;
use App\Http\Requests\IncidenteSaveRequest as SaveRequest;
use Illuminate\Http\Request;

class IncidenteController extends Controller
{
    public function index()
    {
        return view('incidentes.index')->with('incidentes', Incidente::all()->sortByDesc('id') );
    }

    public function create()
    {
        return view('incidentes.create')->with('incidente', new Incidente);
    }

    public function store(SaveRequest $request)
    {
        $prepared = Incidente::prepare( $request->validated() );

        if( ! $incidente = Incidente::create($prepared) )
            return back()->with('failure', 'Error al guardar incidente');

        return redirect()->route('incidentes.index')->with('success', 'Incidente guardado');
    }

    public function show(Incidente $incidente)
    {
        return redirect()->route('incidentes.index');
    }

    public function edit(Incidente $incidente)
    {
        return view('incidentes.edit')->with('incidente', $incidente);
    }

    public function update(SaveRequest $request, Incidente $incidente)
    {
        $prepared = Incidente::prepare( $request->validated() );

        if( ! $incidente->fill($prepared)->save() )
            return back()->with('failure', 'Error al actualizar incidente');

        return back()->with('success', 'Incidente actualizado');
    }

    public function destroy(Incidente $incidente)
    {
        if( $incidente->delete() )
            return back()->with('failure', 'Error al eliminar incidente');

        return redirect()->route('incidentes.index')->with('success', "{$incidente->titulo} eliminado");
    }
}
