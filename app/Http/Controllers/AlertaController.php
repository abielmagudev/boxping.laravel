<?php

namespace App\Http\Controllers;

use App\Alerta;
use App\Http\Requests\AlertaSaveRequest as SaveRequest;
use Illuminate\Http\Request;

class AlertaController extends Controller
{
    public function index()
    {
        return view('alertas.index', [
            'alertas' => Alerta::orderBy('id', 'desc')->get(),
            'config' => config('system.alertas'),
        ]);
    }

    public function create()
    {
        return view('alertas.create', [
            'alerta' => new Alerta,
            'config' => config('system.alertas'),
        ]);
    }

    public function store(SaveRequest $request)
    {
        if( ! $alerta = Alerta::create( $request->validated() ) )
            return back()->with('failure', 'Error al guardar alerta');

        return redirect()->route('alertas.index')->with('success', 'Alerta guardada');
    }

    public function show(Alerta $alerta)
    {
        return redirect()->route('alertas.index');
        // return view('alertas.show')->with('alerta', $alerta);
    }

    public function edit(Alerta $alerta)
    {
        return view('alertas.edit', [
            'alerta' => $alerta,
            'config' => config('system.alertas'),
        ]);
    }

    public function update(SaveRequest $request, Alerta $alerta)
    {
        if( ! $alerta->fill( $request->validated() )->save() )
            return back()->with('failure', 'Error al actualizar la alerta');

        return back()->with('success', 'Alerta actualizada') ;
    }

    public function destroy(Alerta $alerta)
    {
        $nombre = $alerta->nombre;

        if( ! $alerta->delete() )
            return back()->with('failure', 'Error al eliminar alerta');

        return redirect()->route('alertas.index')->with('success', "<b>{$nombre}</b> eliminada");
    }
}
