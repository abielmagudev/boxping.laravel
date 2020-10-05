<?php

namespace App\Http\Controllers;

use App\Etapa;
use App\Ahex\Etapa\Domain\FillingTrait as Filling;
use App\Http\Requests\EtapaSaveRequest as SaveRequest;
use Illuminate\Http\Request;

class EtapaController extends Controller
{
    use Filling;

    public function index()
    {
        return view('etapas.index')->with('etapas', Etapa::all()->sortByDesc('id'));
    }

    public function create()
    {
        return view('etapas.create', [
            'etapa' => new Etapa,
            'medidas_peso' => config('system.measures.peso'),
            'medidas_volumen' => config('system.measures.volumen'),
        ]);
    }

    public function store(SaveRequest $request)
    {
        $data = $this->fill( $request->validated() );

        if( ! $etapa = Etapa::create($data) )
            return back()->withInput()->with('failure', 'Error al guardar etapa.');

        return redirect()->route('etapas.index')->with('success', 'Etapa guardada.');
    }

    public function show(Etapa $etapa)
    {
        return view('etapas.show')->with('etapa', $etapa);
    }

    public function edit(Etapa $etapa)
    {
        return view('etapas.edit', [
            'etapa' => $etapa,
            'medidas_peso' => config('system.measures.peso'),
            'medidas_volumen' => config('system.measures.volumen'),
        ]);
    }

    public function update(SaveRequest $request, Etapa $etapa)
    {
        $data = $this->fill( $request->validated() );

        if( ! $etapa->fill($data)->save() )
            return back()->with('failure', 'Error al actualizar la entrada');

        return back()->with('success', 'Etapa actualizada');
    }

    public function destroy(Etapa $etapa)
    {
        $destroyed = (object) [
            'nombre' => $etapa->nombre,
        ];

        if( ! $etapa->delete() )
            return back()->with('failure', 'Error al eliminar etapa');

        return redirect()->route('etapas.index')->with('success', "{$destroyed->nombre} eliminada");
    }
}
