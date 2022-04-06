<?php

namespace App\Http\Controllers;

use App\Codigor;
use App\Entrada;
use App\Ahex\Entrada\Application\Counter as EntradaCounter;
use App\Http\Requests\CodigorSaveRequest as SaveRequest;
use Illuminate\Http\Request;

class CodigorController extends Controller
{
    public function index()
    {
        return view('codigosr.index')->with('codigosr', Codigor::all()->sortByDesc('id'));
    }

    public function create()
    {
        return view('codigosr.create')->with('codigor', new Codigor);
    }

    public function store(SaveRequest $request)
    {
        $prepared = Codigor::prepare( $request->validated() );

        if(! $codigor = Codigor::create($prepared) )
            return back()->with('failire', 'Error al guardar código de reempacado');

        return redirect()->route('codigosr.index')->with('success', 'Código de reempacado guardado');
    }

    public function show(Codigor $codigor)
    {
        $entradas = Entrada::withindex('reempacador')
                            ->where('codigor_id', $codigor->id)
                            ->orderBy('id', 'desc')
                            ->take(25)
                            ->get();

        return view('codigosr.show', [
            'codigor' => $codigor,
            'entradas_total' => Entrada::where('codigor_id', $codigor->id)->count(),
            'entradas' => $entradas,
            'reempacadores' => EntradaCounter::byReempacador($entradas),
        ]);
    }

    public function edit(Codigor $codigor)
    {
        return view('codigosr.edit')->with('codigor', $codigor);
    }

    public function update(SaveRequest $request, Codigor $codigor)
    {
        $prepared = Codigor::prepare( $request->validated() );

        if(! $codigor->fill($prepared)->save() )
            return back()->with('failure', 'Error al actualizar código de reempacado');

        return back()->with('success', 'Código de reempacado actualizado');
    }

    public function destroy(Codigor $codigor)
    {
        if(! $codigor->delete() )
            return back()->with('failure', 'Error al eliminar código de reempacado');

        return redirect()->route('codigosr.index')->with('success', "Código {$codigor->nombre} eliminado");
    }
}
