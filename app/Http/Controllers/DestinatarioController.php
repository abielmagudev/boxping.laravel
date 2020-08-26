<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DestinatarioSaveRequest;
use App\Destinatario;
use App\Entrada;

class DestinatarioController extends Controller
{
    use Traits\Userlive,
        Traits\DestinatarioSave;

    public function index()
    {
        return view('destinatarios.index', [
            'destinatarios_count' => Destinatario::all()->count(),
            'destinatarios' => Destinatario::orderBy('id', 'desc')->paginate(16),
        ]);
    }

    public function create()
    {
        return view('destinatarios.create', [
            'destinatario' => new Destinatario,
        ]);
    }

    public function store(DestinatarioSaveRequest $request)
    {
        if(! $destinatario = $this->storeDestinatario($request) )
            return back()->with('failure','Error al agregar destinatario');
        
        return redirect()->route('destinatarios.index')->with('success', 'Destinatario agregado');
    }

    public function show(Destinatario $destinatario)
    {
        return view('destinatarios.show', [
            'destinatario' => $destinatario,
            'entradas' => Entrada::with(['consolidado', 'cliente'])->where('destinatario_id', $destinatario->id)->get()
        ]);
    }

    public function edit(Destinatario $destinatario)
    {
        return view('destinatarios.edit', [
            'destinatario' => $destinatario,
        ]);
    }

    public function update(DestinatarioSaveRequest $request, Destinatario $destinatario)
    {
        if(! $this->updateDestinatario($request, $destinatario) )
            return back()->with('failure', 'Error al actualizar destinatario');
        
        return back()->with('success', 'Destinatario actualizado');
    }

    public function destroy(Destinatario $destinatario)
    {
        if(! $destinatario->delete() )
            return back()->with('failure', 'Error al eliminar destinatario');
        
        return redirect()->route('destinatarios.index')->with('success', 'Destinatario eliminado');
    }
}
