<?php

namespace App\Http\Controllers;

use App\Etapa;
use App\Http\Requests\EtapaSaveRequest as SaveRequest;
use Illuminate\Http\Request;

use App\Ahex\Etapa\Domain\Storer;
use App\Ahex\Etapa\Domain\Updater;

class EtapaController extends Controller
{
    public function index()
    {
        return view('etapas.index')->with('etapas', Etapa::all()->sortByDesc('id'));
    }

    public function create()
    {
        return view('etapas.create')->with('etapa', new Etapa);
    }

    public function store(SaveRequest $request)
    {
        if( ! $etapa = Storer::save($request->validated()) )
            return back()->withInput()->with('failure', 'Error al guardar etapa.');

        return redirect()->route('etapas.index')->with('success', 'Etapa guardada.');
    }

    public function show(Etapa $etapa)
    {
        return redirect()->route('etapas.index');
    }


    public function edit(Etapa $etapa)
    {
        return view('etapas.edit')->with('etapa', $etapa);
    }

    public function update(SaveRequest $request, Etapa $etapa)
    {
        if( ! Updater::save($request->validated(), $etapa) )
            return back()->with('failure', 'Error al actualizar la entrada');

        return back()->with('success', 'Etapa actualizada');
    }

    public function destroy(Etapa $etapa)
    {
        $nombre = $etapa->nombre;

        if( ! $etapa->delete() )
            return back()->with('failure', 'Error al eliminar etapa');

        return redirect()->route('etapas.index')->with('success', "{$nombre} eliminada");
    }
}
