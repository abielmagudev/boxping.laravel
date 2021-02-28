<?php

namespace App\Http\Controllers;

use App\Entrada;
use App\Destinatario;
use App\Remitente;
use Illuminate\Http\Request;

class TrayectoriaController extends Controller
{
    public function index()
    {
        return view('trayectoria.index', [
            'destinatarios' => Destinatario::all()->sortByDesc('id'),
            'remitentes' => Remitente::all()->sortByDesc('id'),
        ]);
    }
}
