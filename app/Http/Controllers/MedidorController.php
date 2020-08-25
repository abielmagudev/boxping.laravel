<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MedidorSaveRequest;

use App\Medidor;

class MedidorController extends Controller
{
    public function index()
    {
        return view('medidores.index', [
            'medidores' => Medidor::all()->sortByDesc('id')
        ]);
    }

    public function create()
    {
        return view('medidores.create', [
            'medidor' => new Medidor
        ]);
    }

    public function store(MedidorSaveRequest $request)
    {
        if(! $medidor = Medidor::create( $request->validated() ))
            return back()->with('failure', 'Error al guardar medidor');
        
        return redirect()->route('medidores.index')->with('success', 'Medidor guardado');
    }

    public function edit(Medidor $medidor)
    {
        return view('medidores.edit', [
            'medidor' => $medidor,
        ]);
    }

    public function update(MedidorSaveRequest $request, Medidor $medidor)
    {
        if(! $medidor->fill( $request->validated() )->save() )
            return back()->with('failure', 'Error al actualizar medidor');

        return back()->with('success', 'Medidor actualizado');
    }

    public function destroy(Medidor $medidor)
    {
        if(! $medidor->delete() )
            return back()->with('failure', 'Error al eliminar medidor');

        return redirect()->route('medidores.index')->with('success', 'Medidor eliminado');
    }
}
