<?php

namespace App\Http\Controllers;

use App\Observacion;
use App\Http\Requests\ObservacionSaveRequest as SaveRequest;
use Illuminate\Http\Request;

class ObservacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('observaciones.index', [
            'observaciones' => Observacion::orderBy('id', 'desc')->get(),
            'config' => config('system.observaciones'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('observaciones.create', [
            'observacion' => new Observacion,
            'config' => config('system.observaciones'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveRequest $request)
    {
        if( ! $observacion = Observacion::create( $request->validated() ) )
            return back()->with('failure', 'Error al guardar observacion');

        return redirect()->route('observaciones.index')->with('success', 'Observación guardada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Observacion  $observacion
     * @return \Illuminate\Http\Response
     */
    public function show(Observacion $observacion)
    {
        return view('observaciones.show')->with('observacion', $observacion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Observacion  $observacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Observacion $observacion)
    {
        return view('observaciones.edit', [
            'observacion' => $observacion,
            'config' => config('system.observaciones'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Observacion  $observacion
     * @return \Illuminate\Http\Response
     */
    public function update(SaveRequest $request, Observacion $observacion)
    {
        if( ! $observacion->fill( $request->validated() )->save() )
            return back()->with('failure', 'Error al actualizar la observacion');

        return back()->with('success', 'Observación actualizada') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Observacion  $observacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Observacion $observacion)
    {
        $nombre = $observacion->nombre;

        if( ! $observacion->delete() )
            return back()->with('failure', 'Error al eliminar observacion');

        return redirect()->route('observaciones.index')->with('success', "<b>{$nombre}</b> observacion eliminada");
    }
}
