<?php

namespace App\Http\Controllers;

use App\Etapa;
use App\Http\Requests\EtapaSaveRequest as SaveRequest;
use Illuminate\Http\Request;

class EtapaController extends Controller
{
    public function index()
    {
        return view('etapas.index')->with('etapas', Etapa::all()->sortBy('orden'));
    }

    public function create()
    {
        return view('etapas.create')->with('etapa', new Etapa);
    }

    public function store(SaveRequest $request)
    {
        $prepared = Etapa::prepare($request->validated());

        if(! $etapa = Etapa::create($prepared) )
            return back()->withInput()->with('failure', 'Error al guardar etapa');

        return redirect()->route('etapas.index')->with('success', "{$etapa->nombre} guardada");
    }

    public function show(Etapa $etapa)
    {
        return view('etapas.show')->with('etapa', $etapa);
    }

    public function edit(Etapa $etapa)
    {
        return view('etapas.edit')->with('etapa', $etapa);
    }

    public function update(SaveRequest $request, Etapa $etapa)
    {
        $prepared = Etapa::prepare($request->validated());

        if(! $etapa->fill($prepared)->save() )
            return back()->with('failure', 'Error al actualizar la entrada');

        return back()->with('success', 'Etapa actualizada');
    }

    public function destroy(Etapa $etapa)
    {
        if( ! $etapa->delete() )
            return back()->with('failure', 'Error al eliminar etapa');

        return redirect()->route('etapas.index')->with('success', "{$etapa->nombre} eliminada");
    }
}
