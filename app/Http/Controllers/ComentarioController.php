<?php

namespace App\Http\Controllers;

use App\Comentario;
use App\Entrada;
use App\Ahex\Fake\Domain\Fakeuser;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request, Entrada $entrada)
    {
        $request->validate([
                'contenido' => 'required',
            ], [
                'contenido.required' => __('Escribe el contenido del comentario'),
            ]
        );

        $filled = [
            'entrada_id' => $entrada->id,
            'contenido'  => $request->contenido,
            'created_by' => Fakeuser::live(),
        ];

        if( ! Comentario::create($filled) )
            return back()->with('failure', 'Error al agregar comentario');

        return back()->with('success', 'Nuevo comentario agregado');
    }
}
