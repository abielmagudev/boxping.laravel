<?php

namespace App\Http\Controllers;

use App\Etapa;
use App\Alerta;
use App\Entrada;
use App\EntradaEtapa;
use App\Http\Requests\RegistrarEtapaRequest;
use App\Http\Requests\RegistrarSaveRequest;
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

    public function update(RegistrarSaveRequest $request)
    {
        $prepared = EntradaEtapa::prepare( $request->validated() );
        $entrada  = Entrada::findByNumero($request->numero);
        $etapa    = Etapa::findBySlug($request->etapa);

        $entrada->etapas()->detach($etapa->id);

        if( ! is_null( $entrada->etapas()->attach($etapa->id, $prepared) ) )
            return back()->withInput()->with('failure', 'Error al actualizar etapa de la entrada');
        
        return redirect()->route('registrar.index', ['etapa' => $etapa->slug])->with('success', "Etapa de la entrada {$entrada->numero} actualizada");
    }
}
