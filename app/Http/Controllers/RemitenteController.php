<?php

namespace App\Http\Controllers;

use App\Remitente;
use App\Entrada;
use App\Http\Requests\RemitenteSaveRequest as SaveRequest;
use Illuminate\Http\Request;

class RemitenteController extends Controller
{
    public function index()
    {
        return view('remitentes.index')->with('remitentes', Remitente::orderBy('id', 'desc')->paginate(16));
    }

    public function create(Request $request)
    {
        return view('remitentes.create')->with('remitente', new Remitente);
    }

    public function store(SaveRequest $request)
    {
        $prepared = Remitente::prepare( $request->validated() );

        if(! $remitente = Remitente::create($prepared) )
            return back()->with('failure', 'Error al guardar remitente');

        return redirect()->route('remitentes.index')->with('success', 'Remitente guardardo');
    }

    public function show(Remitente $remitente)
    {
        $entradas =Entrada::withIndex()
                            ->where('remitente_id', $remitente->id)
                            ->take(25)
                            ->get();

        return view('remitentes.show', [
            'remitente' => $remitente,
            'entradas_total' => Entrada::where('remitente_id', $remitente->id)->count(),
            'entradas' => $entradas,
        ]);
    }

    public function edit(Remitente $remitente)
    {
        return view('remitentes.edit')->with('remitente', $remitente);
    }

    public function update(SaveRequest $request, Remitente $remitente)
    {
        $prepared = Remitente::prepare( $request->validated() );
        
        if(! $remitente->fill( $prepared )->save() )
            return back()->with('failure', 'Error al actualizar remitente');

        return back()->with('success', 'Remitente actualizado');
    }

    public function destroy(Remitente $remitente)
    {
        if(! $remitente->delete() )
            return back()->with('failure', 'Error al eliminar remitente');

        return redirect()->route('remitentes.index')->with('success', "Remitente {$remitente->nombre} eliminado");
    }
}
