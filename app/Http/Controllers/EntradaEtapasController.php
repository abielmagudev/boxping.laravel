<?php

namespace App\Http\Controllers;

use App\Entrada;
use App\Etapa;
use Illuminate\Http\Request;

class EntradaEtapasController extends Controller
{
    public function index()
    {
        // Not index...
        return back();
    }

    public function create(Entrada $entrada)
    {
        return view('entradas.etapas.create', [
            'entrada' => $entrada,
            'etapas' => Etapa::all(['id', 'nombre']),
            'peso_options' => config('system.measures.peso'),
            'dimension_options' => config('system.measures.dimension'),
        ]);
    }

    public function store(Request $request)
    {
        dd($request->all());
        return;
    }

    public function show($id)
    {
        // Not show...
        return back();
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
