<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehiculo;
use App\Conductor;


class ImportacionController extends Controller
{
    public function index()
    {
        return view('importacion.index', [
            'conductores' => Conductor::all()->sortBy('nombre'),
            'vehiculos' => Vehiculo::all()->sortByDesc('id'),
        ]);
    }
}
