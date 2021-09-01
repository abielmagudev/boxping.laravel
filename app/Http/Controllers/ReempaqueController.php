<?php

namespace App\Http\Controllers;

use App\Codigor;
use App\Entrada;
use App\Http\Requests\ReempaqueSaveRequest;
use Illuminate\Http\Request;

class ReempaqueController extends Controller
{
    public function index()
    {
        return view('reempaque.index')->with('codigosr', Codigor::all());
    }

    public function update(ReempaqueSaveRequest $request)
    {
        $entrada = Entrada::where('numero', $request->numero)->first();
        
        if( ! $entrada->fill(['codigor_id' => $request->codigor])->save() )
            return back()->with('failure', 'Error al actualizar código de reempacado de entrada');
            
        return back()->with('success', 'Código de reempacado de entrada actualizado');
    }
}
