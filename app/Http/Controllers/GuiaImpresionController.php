<?php

namespace App\Http\Controllers;

use App\Transportadora;
use App\GuiaImpresion;
use App\Ahex\GuiaImpresion\Application\Contenido\ContentContainer;
use App\Http\Requests\GuiaImpresionSaveRequest as SaveRequest;
use Illuminate\Http\Request;

class GuiaImpresionController extends Controller
{
    public function create(Transportadora $transportadora)
    {
        return view('guias_impresion.create', [
            'mediciones' => config('system.medidas'),
            'tipografias' => config('system.tipografias'),
            'contenidos' => ContentContainer::all(),
            'transportadora' => $transportadora,
            'guia' => new GuiaImpresion,
        ]);
    }

    public function store(Transportadora $transportadora, SaveRequest $request)
    {
        $prepared = GuiaImpresion::prepare($request->validated());

        if( ! $guia = GuiaImpresion::create($prepared) )
            return back()->with('failure', 'Error al guardar guía de impresión');

        return redirect()->route('transportadoras.show', $guia->transportadora_id)->with('success', "Guía de impresión {$guia->nombre} guardada");
    }

    public function edit(Transportadora $transportadora, GuiaImpresion $guia)
    {
        return view('guias_impresion.edit', [
            'mediciones' => config('system.medidas'),
            'tipografias' => config('system.tipografias'),
            'contenidos' => ContentContainer::all(),
            'transportadora' => $transportadora,
            'guia' => $guia,
        ]);
    }

    public function update(Transportadora $transportadora, GuiaImpresion $guia, SaveRequest $request)
    {
        $prepared = GuiaImpresion::prepare($request->validated());

        if( ! $guia->fill($prepared)->save() )
            return back()->with('failure', 'Error al actualizar guía de impresión');

        return back()->with('success', "Guía de impresión {$guia->nombre} actualizada");
    }

    public function destroy(Transportadora $transportadora, GuiaImpresion $guia)
    {
        if( ! $guia->delete() )
            return back()->with('failure', 'Error al eliminar guía de impresión');

        return redirect()->route('transportadoras.show', $transportadora)->with('success', "Guía de impresión {$guia->nombre} eliminada");
    }
}
