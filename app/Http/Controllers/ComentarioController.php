<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ComentarioSaveRequest as SaveRequest;
use App\Comentario;
use App\Entrada;

class ComentarioController extends Controller
{
    public function store(SaveRequest $request)
    {
        $prepared = Comentario::prepare($request->validated());

        if(! Comentario::create($prepared) )
            return back()->with('failure', 'Error al guardar comentario');

        return back()->with('success', 'Comentario guardado');
    }
}
