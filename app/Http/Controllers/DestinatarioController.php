<?php

namespace App\Http\Controllers;

use App\Destinatario;
use App\Entrada;
use App\Http\Requests\DestinatarioSaveRequest as SaveRequest;
use Illuminate\Http\Request;

class DestinatarioController extends Controller
{
    public function index()
    {
        return view('destinatarios.index')->with('destinatarios', Destinatario::orderBy('id', 'desc')->paginate());
    }

    public function create()
    {
        return view('destinatarios.create')->with('destinatario', new Destinatario);
    }

    public function store(SaveRequest $request)
    {
        $prepared = Destinatario::prepare( $request->validated() );

        if(! $destinatario = Destinatario::create($prepared) )
            return back()->with('failure','Error al guardar destinatario');
        
        return redirect()->route('destinatarios.index')->with('success', 'Destinatario guardado');
    }

    public function show(Destinatario $destinatario)
    {
        return view('destinatarios.show', [
            'destinatario' => $destinatario,
            'entradas' => Entrada::with(['consolidado', 'cliente', 'destinatario'])->where('destinatario_id', $destinatario->id)->get()
        ]);
    }

    public function edit(Destinatario $destinatario)
    {
        return view('destinatarios.edit')->with('destinatario', $destinatario);
    }

    public function update(SaveRequest $request, Destinatario $destinatario)
    {
        $prepared = Destinatario::prepare( $request->validated() );
        
        if(! $destinatario->fill($prepared)->save() )
            return back()->with('failure', 'Error al actualizar destinatario');

        return back()->with('success', 'Destinatario actualizado');
    }

    public function destroy(Destinatario $destinatario)
    {
        if(! $destinatario->delete() )
            return back()->with('failure', 'Error al eliminar destinatario');
        
        return redirect()->route('destinatarios.index')->with('success', "Destinatario {$destinatario->nombre} eliminado");
    }
}
