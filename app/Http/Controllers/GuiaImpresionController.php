<?php

namespace App\Http\Controllers;

use App\Ahex\GuiaImpresion\Application\InformantsMananger;
use App\Ahex\GuiaImpresion\Infrastructure\PageDesigner\PageDesigner;
use App\Http\Requests\GuiaImpresionSaveRequest as SaveRequest;
use Illuminate\Http\Request;
use App\GuiaImpresion;

class GuiaImpresionController extends Controller
{
    public function index()
    {
        return view('guias_impresion.index')->with('guias', GuiaImpresion::all()->sortByDesc('id'));
    }

    public function show(GuiaImpresion $guia)
    {
        return redirect()->route('guias_impresion.index');
    }

    public function create()
    {
        return view('guias_impresion.create', [
            'pageDesigner' => PageDesigner::class,
            'informantsManager' => InformantsMananger::class,
            'guia' => new GuiaImpresion,
        ]);
    }

    public function store(SaveRequest $request)
    {
        $prepared = GuiaImpresion::prepare($request->validated());

        if( ! $guia = GuiaImpresion::create($prepared) )
            return back()->with('failure', 'Error al guardar guía de impresión');

        return redirect()->route('guias_impresion.index')->with('success', "Guía de impresión {$guia->nombre} guardada");
    }

    public function edit(GuiaImpresion $guia)
    {
        return view('guias_impresion.edit', [
            'pageDesigner' => PageDesigner::class,
            'informantsManager' => InformantsMananger::class,
            'guia' => $guia,
        ]);
    }

    public function update(GuiaImpresion $guia, SaveRequest $request)
    {
        $prepared = GuiaImpresion::prepare($request->validated());

        if( ! $guia->fill($prepared)->save() )
            return back()->with('failure', 'Error al actualizar guía de impresión');

        return back()->with('success', "Guía de impresión {$guia->nombre} actualizada");
    }

    public function destroy(GuiaImpresion $guia)
    {
        if( ! $guia->delete() )
            return back()->with('failure', 'Error al eliminar guía de impresión');

        return redirect()->route('guias_impresion.index')->with('success', "Guía de impresión {$guia->nombre} eliminada");
    }
}
