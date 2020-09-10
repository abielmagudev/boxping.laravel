<?php

namespace App\Http\Controllers;

use App\Observacion;
use App\Entrada;
use App\Ahex\Fake\Domain\Fakeuser;
use Illuminate\Http\Request;

class ObservacionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(
            // Rules
            [
                'entrada' => ['required','exists:entradas,id'],
                'contenido' => 'required',
            ],
            // Messages
            [
                'entrada.required'   => __('Requiere la entrada'),
                'entrada.exists'    => __('Requiere una entrada válida'),
                'contenido.required' => __('Escribe el contenido de la observación'),
            ]
        );

        $filled = [
            'entrada_id' => $request->entrada,
            'contenido' => $request->contenido,
            'created_by_user' => Fakeuser::live(),
        ];

        if( ! Observacion::create($filled) )
            return back()->with('failure', 'Error al agregar observación');

        return back()->with('success', 'Observacion agregada');
    }
}
