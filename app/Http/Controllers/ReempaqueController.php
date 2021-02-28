<?php

namespace App\Http\Controllers;

use App\Entrada;
use App\Reempacador;
use App\Codigor;
use Illuminate\Http\Request;

class ReempaqueController extends Controller
{
    public function index()
    {
        return view('reempaque.index', [
            'reempacadores' => Reempacador::all()->sortBy('nombre'),
            'codigosr' => Codigor::all()->sortBy('nombre'),
        ]);
    }
}
