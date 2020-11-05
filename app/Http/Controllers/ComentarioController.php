<?php

namespace App\Http\Controllers;

use App\Comentario;
use App\Entrada;
use App\Http\Requests\ComentarioSaveRequest as SaveRequest;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(SaveRequest $request, Entrada $entrada)
    {
        $validated = array_merge($request->validated(), ['entrada' => $entrada->id]);
        $prepared = Comentario::prepare($validated);

        if(! Comentario::create($prepared) )
            return back()->with('failure', 'Error al guardar comentario');

        return back()->with('success', 'Comentario guardado');
    }
}
