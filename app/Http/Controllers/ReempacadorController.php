<?php

namespace App\Http\Controllers;

use App\Reempacador;
use App\Entrada;
use App\Http\Requests\ReempacadorSaveRequest as SaveRequest;
use Illuminate\Http\Request;
use App\Ahex\Reempacador\Application\CodigosrTrait as Codigosr;

class ReempacadorController extends Controller
{
    use Codigosr;

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

        return redirect()->route('reempaque.index')->with('success', 'Reempacador guardado');
    }

    public function show(Reempacador $reempacador)
    {
        $entradas = Entrada::with(['destinatario', 'codigor'])->where('reempacador_id', $reempacador->id)->get();
        
        return view('reempacadores.show', [
            'reempacador' => $reempacador,
            'entradas' => $entradas,
            'codigosr' => $this->codigosr($entradas),
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
