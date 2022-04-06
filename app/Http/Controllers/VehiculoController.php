<?php

namespace App\Http\Controllers;

use App\Entrada;
use App\Vehiculo;
use App\Ahex\Entrada\Application\Counter as EntradaCounter;
use App\Http\Requests\VehiculoSaveRequest as SaveRequest;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{    
    public function index()
    {
        return view('vehiculos.index')->with('vehiculos', Vehiculo::all()->sortByDesc('id'));
    }

    public function create()
    {
        return view('vehiculos.create')->with('vehiculo', new Vehiculo);
    }

    public function store(SaveRequest $request)
    {
        $prepared = Vehiculo::prepare( $request->validated() );

        if( ! $vehiculo = Vehiculo::create($prepared) )
            return back()->with('failure', 'Error al guardar vehículo');

        return redirect()->route('vehiculos.index')->with('success', "Vehículo {$vehiculo->nombre} guardado");
    }

    public function show(Vehiculo $vehiculo)
    {
        $entradas = Entrada::withIndex('conductor')
                            ->where('vehiculo_id', $vehiculo->id)
                            ->orderBy('id', 'desc')
                            ->take(25)
                            ->get();

        return view('vehiculos.show', [
            'conductores_counter' => EntradaCounter::byConductor($entradas),
            'entradas_total' => Entrada::where('vehiculo_id', $vehiculo->id)->count(),
            'entradas' => $entradas,
            'vehiculo' => $vehiculo,
        ]);
    }

    public function edit(Vehiculo $vehiculo)
    {
        return view('vehiculos.edit')->with('vehiculo', $vehiculo);
    }

    public function update(SaveRequest $request, Vehiculo $vehiculo)
    {
        $prepared = Vehiculo::prepare( $request->validated() );

        if( ! $vehiculo->fill($prepared)->save() )
            return back()->with('failure', 'Error al actualizar vehículo');

        return back()->with('success', 'Vehículo actualizado');
    }

    public function destroy(Vehiculo $vehiculo)
    {
        if( ! $vehiculo->delete() )
            return back()->with('failure', 'Error al eliminar vehículo');

        return redirect()->route('vehiculos.index')->with('success', "Vehículo {$vehiculo->nombre} eliminado");
    }
}
