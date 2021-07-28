<?php

namespace App\Http\Controllers;

use App\Configuracion;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    public function index()
    {
        return view('configuraciones.index')->with('configuracion', Configuracion::find(1));
    }

    public function show(Configuracion $configuracion)
    {
        //
    }

    public function edit(Configuracion $configuracion)
    {
        //
    }

    public function update(Request $request, Configuracion $configuracion)
    {
        $prepared = Configuracion::prepare( $request->all() );

        if( ! $configuracion->fill($prepared)->save() )
            return back()->with('failure', 'Error al actualizar la configuración.');

        return back()->with('success', 'Configuración actualizada.');
    }
}
