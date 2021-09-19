<?php

namespace App\Http\Controllers;

use App\Etapa;
use App\Alerta;
use Illuminate\Http\Request;

class RegistrarController extends Controller
{
    public function index(Request $request)
    {        
        $etapa = $request->filled('etapa') ? Etapa::where('slug', $request->etapa)->first() : new Etapa;

        return view('registrar.index', [
            'has_etapa' => ! is_null($etapa->slug),
            'etapa' => $etapa,
            'etapas' => Etapa::all(),
            'alertas' => Alerta::all(),
        ]);
    }

    public function update(Request $request)
    {
        dd($request);
    }
}
