<?php

namespace App\Http\Controllers;

use App\Etapa;
use App\Alerta;
use App\Http\Requests\RegistrarEtapaRequest;
use Illuminate\Http\Request;

class RegistrarController extends Controller
{
    public function index(RegistrarEtapaRequest $request)
    {        
        return view('registrar.index', [
            'etapa' => $request->filled('etapa') ? Etapa::where('slug', $request->etapa)->first() : new Etapa,
            'etapas' => Etapa::all(),
            'alertas' => Alerta::all(),
        ]);
    }

    public function update(Request $request)
    {
        dd($request);
    }
}
