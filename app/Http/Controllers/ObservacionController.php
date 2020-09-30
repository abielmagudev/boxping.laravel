<?php

namespace App\Http\Controllers;

use App\Observacion;
use App\Entrada;
use App\Ahex\Fake\Domain\Fakeuser;
use Illuminate\Http\Request;

class ObservacionController extends Controller
{
    public function store(Request $request, Entrada $entrada)
    {
        $request->validate([
                'contenido' => 'required',
            ], [
                'contenido.required' => __('Escribe el contenido de la observación'),
            ]
        );

        $filled = [
            'entrada_id' => $entrada->id,
            'contenido'  => $request->contenido,
            'created_by' => Fakeuser::live(),
        ];

        if( ! Observacion::create($filled) )
            return back()->with('failure', 'Error al agregar observación');

        return back()->with('success', 'Observacion agregada');
    }
}
