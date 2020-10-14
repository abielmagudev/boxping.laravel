<?php

namespace App\Http\Controllers;

use App\Alerta;
use App\Http\Requests\AlertaSaveRequest as SaveRequest;
use Illuminate\Http\Request;

class AlertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('alertas.index')->with('alertas', Alerta::orderBy('id', 'desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alertas.create', [
            'alerta' => new Alerta,
            'niveles' => config('system.niveles_alerta'),
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
        if( ! $alerta = Alerta::create( $request->validated() ) )
            return back()->with('failure', 'Error al guardar alerta');

        return redirect()->route('alertas.index')->with('success', 'Alerta guardada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alerta  $alerta
     * @return \Illuminate\Http\Response
     */
    public function show(Alerta $alerta)
    {
        return view('alertas.show')->with('alerta', $alerta);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alerta  $alerta
     * @return \Illuminate\Http\Response
     */
    public function edit(Alerta $alerta)
    {
        return view('alertas.edit', [
            'alerta' => $alerta,
            'niveles' => config('system.niveles_alerta'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alerta  $alerta
     * @return \Illuminate\Http\Response
     */
    public function update(SaveRequest $request, Alerta $alerta)
    {
        if( ! $alerta->fill( $request->validated() )->save() )
            return back()->with('failure', 'Error al actualizar la entrada');

        return back()->with('success', 'Alerta actualizada') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alerta  $alerta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alerta $alerta)
    {
        $nombre = $alerta->nombre;

        if( ! $alerta->delete() )
            return back()->with('failure', 'Error al eliminar alerta');

        return redirect()->route('alertas.index')->with('success', "<b>{$nombre}</b> alerta eliminada");
    }
}
