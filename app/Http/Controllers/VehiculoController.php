<?php

namespace App\Http\Controllers;

use App\Vehiculo;
use App\Entrada;
use App\Ahex\Vehiculo\Application\ConductoresTrait as Conductores;
use App\Http\Requests\VehiculoSaveRequest as SaveRequest;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    use Conductores;
    
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
        $entradas = Entrada::with(['destinatario','conductor'])
                            ->where('vehiculo_id', $vehiculo->id)
                            ->orderBy('id', 'desc')
                            ->get();
        
        $conductores = $this->conductoresDelVehiculo($entradas);

        return view('vehiculos.show', [
            'vehiculo' => $vehiculo,
            'entradas' => $entradas,
            'entradas_take' => 10,
            'conductores' => $conductores,
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
