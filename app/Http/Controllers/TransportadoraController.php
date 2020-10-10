<?php

namespace App\Http\Controllers;

use App\Transportadora;
use App\Http\Requests\TransportadoraSaveRequest as SaveRequest;
use Illuminate\Http\Request;

class TransportadoraController extends Controller
{
    public function index()
    {
        return view('transportadoras.index')->with('transportadoras', Transportadora::orderBy('id', 'desc')->get() );
    }

    public function create()
    {
        return view('transportadoras.create')->with('transportadora', new Transportadora);
    }

    public function store(SaveRequest $request)
    {
        if( ! $transportadora = Transportadora::create( $request->validated() ) )
            return back()->with('failure', 'Error al guardar transportadora');

        return redirect()->route('transportadoras.index')->with('success', 'Transportadora guardada');
    }

    public function show(Transportadora $transportadora)
    {
        return view('transportadoras.show')->with('transportadora', $transportadora);
    }

    public function edit(Transportadora $transportadora)
    {
        return view('transportadoras.edit')->with('transportadora', $transportadora);
    }

    public function update(SaveRequest $request, Transportadora $transportadora)
    {
        if( ! $transportadora->fill( $request->validated() )->save() )
            return back()->with('failure', 'Error al actualizar transportadora');
            
        return back()->with('success', 'Transportadora actualizada');
    }

    public function destroy(Transportadora $transportadora)
    {
        $nombre = $transportadora->nombre;

        if( ! $transportadora->delete() )
            return back()->with('failure', 'Error al eliminar transportadora');

        return redirect()->route('transportadoras.index')->with('success', "Transportadora {$nombre} eliminada");
    }
}
