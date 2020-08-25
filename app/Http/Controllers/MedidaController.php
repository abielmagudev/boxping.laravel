<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Medida;
use App\Medidor;
use App\Entrada;

class MedidaController extends Controller
{
    use Traits\Userlive;

    public function create(Request $request)
    {
        $request->validate([
            'entrada' => ['required', 'exists:entradas,id'],
        ]);

        return view('medidas.create', [
            'medida' => new Medida,
            'entrada' => Entrada::find($request->entrada),
            'medidores' => Medidor::all(),
            'pesajes' => config('system.measures.pesajes'),
            'volumenes' => config('system.measures.volumenes'),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'entrada' => ['required', 'exists:entradas,id'],
            'medidor' => ['required', 'exists:medidores,id'],
            'peso' => 'required',
            'pesaje' => 'required',
            'ancho' => 'nullable',
            'altura' => 'nullable',
            'profundidad' => 'nullable',
            'volumen' => 'nullable'
        ]);

        $validated = array(
            'entrada_id' => $request->entrada,
            'medidor_id' => $request->medidor,
            'peso' => $request->peso,
            'pesaje' => $request->pesaje,
            'ancho' => $request->ancho,
            'altura' => $request->altura,
            'profundidad' => $request->profundidad,
            'volumen' => $request->volumen,
            'created_by_user' => $this->userlive(),
            'updated_by_user' => $this->userlive(),
        );

        if(! $medida = Medida::create($validated) )
            return back()->with('failure', 'Error al agregar medida');

        return redirect()->route('entradas.show', $medida->entrada_id)->with('success', 'Medida guardada');
    }

    public function edit(Medida $medida)
    {
        return view('medidas.edit', [
            'medida' => $medida,
            'medidores' => Medidor::all(),
            'pesajes' => config('system.measures.pesajes'),
            'volumenes' => config('system.measures.volumenes'),
        ]);
    }

    public function update(Request $request, Medida $medida)
    {
        $request->validate([
            'medidor' => ['required', 'exists:medidores,id'],
            'peso' => 'required',
            'pesaje' => 'required',
            'ancho' => 'nullable',
            'altura' => 'nullable',
            'profundidad' => 'nullable',
            'volumen' => 'nullable'
        ]);

        $validated = array(
            'medidor_id' => $request->medidor,
            'peso' => $request->peso,
            'pesaje' => $request->pesaje,
            'ancho' => $request->ancho,
            'altura' => $request->altura,
            'profundidad' => $request->profundidad,
            'volumen' => $request->volumen,
            'updated_by_user' => $this->userlive(),
        );

        if(! $medida->fill($validated)->save() )
            return back()->with('failure', 'Error al actualizar medida');

        return back()->with('success', 'Medida actualizada');
    }

    public function destroy(Medida $medida)
    {
        $entrada_id = $medida->entrada_id;

        if(! $medida->delete() )
            return back()->with('failure', 'Error al eliminar medida');

        return redirect()->route('entradas.show', $entrada_id)->with('success', 'Medida eliminada');
    }
}
