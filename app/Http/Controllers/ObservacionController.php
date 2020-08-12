<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Observacion;
use App\Entrada;

class ObservacionController extends Controller
{
    public function store(Request $request)
    {
        $this->validateRequest( $request );

        $to_store = $this->prepareToSave( $request->all() );
        if(! Observacion::create($to_store) )
            return back()->with('failure', 'Error al agregar observacion');

        return back()->with('success', 'Observacion agregada');
    }

    // public function edit(Observacion $observacion)
    // {
    //     //
    // }

    // public function update(Request $request, Observacion $observacion)
    // {
    //     //
    // }

    // public function destroy(Observacion $observacion)
    // {
    //     //
    // }

    private function validateRequest( $request )
    {
        $request->validate(
            // Rules
            [
                'entrada' => ['required','integer'],
                'contenido' => 'required',
            ],
            // Messages
            [
                'entrada.required'   => __('Requiere una entrada valida'),
                'entrada.integer'    => __('Requiere una entrada valida'),
                'contenido.required' => __('Escribe el contenido de la observacion'),
            ]
        );

        if(! Entrada::where('id', $request->get('entrada'))->exists() )
            return back()->with('failure', 'Entrada no es valida');
        
        return;
    }

    private function prepareToSave($validated)
    {
        return array(
            'entrada_id' => $validated['entrada'],
            'contenido' => $validated['contenido'],
            'user_id' => rand(1,10),
        );
    }
}
