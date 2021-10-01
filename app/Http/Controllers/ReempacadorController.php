<?php

namespace App\Http\Controllers;

use App\Reempacador;
use App\Entrada;
use App\Http\Requests\ReempacadorSaveRequest as SaveRequest;
use App\Ahex\Entrada\Application\Counter as EntradaCounter;
use Illuminate\Http\Request;

class ReempacadorController extends Controller
{
    public function index()
    {
        return view('reempacadores.index')->with('reempacadores', Reempacador::all()->sortByDesc('id'));
    }

    public function create()
    {
        return view('reempacadores.create')->with('reempacador', new Reempacador);
    }

    public function store(SaveRequest $request)
    {
        $prepared = Reempacador::prepare($request->validated());

        if(! Reempacador::create($prepared) )
            return back()->with('failure'. 'Error al guardar reempacador');

        return redirect()->route('reempacadores.index')->with('success', 'Reempacador guardado');
    }

    public function show(Reempacador $reempacador)
    {
        $entradas = Entrada::with(['codigor','consolidado','cliente','destinatario'])
                            ->where('reempacador_id', $reempacador->id)
                            ->orderBy('id', 'desc')
                            ->get();
        
        return view('reempacadores.show', [
            'codigosr_counter' => EntradaCounter::byCodigor($entradas),
            'entradas' => $entradas,
            'reempacador' => $reempacador,
        ]);
    }

    public function edit(Reempacador $reempacador)
    {
        return view('reempacadores.edit')->with('reempacador', $reempacador);
    }

    public function update(SaveRequest $request, Reempacador $reempacador)
    {
        $prepared = Reempacador::prepare( $request->validated() );

        if(! $reempacador->fill($prepared)->save() )
            return back()->with('failure', 'Error al actualizar reempacador');

        return back()->with('success', 'Reempacador actualizado');
    }

    public function destroy(Reempacador $reempacador)
    {
        if(! $reempacador->delete() )
            return back()->with('failure', 'Error al eliminar reempacador');

        return redirect()->route('reempaque.index')->with('success', "{$reempacador->nombre} eliminado");
    }
}
