<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RemitenteCreateRequest;
use App\Http\Requests\RemitenteSaveRequest;

use App\Remitente;
use App\Entrada;

class RemitenteController extends Controller
{
    use Traits\Userlive,
        Traits\RemitenteSave;

    public function index()
    {
        return view('remitentes.index', [
            'remitentes' => Remitente::orderBy('id', 'desc')->paginate(16)
        ]);
    }

    public function create()
    {
        return view('remitentes.create', [
            'remitente' => new Remitente,
        ]);
    }

    public function store(RemitenteSaveRequest $request)
    {
        if(! $remitente = $this->storeRemitente($request) )
            return back()->with('failure', 'Error al agregar remitente');

        return redirect()->route('remitentes.index')->with('success', 'Remitente agregado');
    }

    public function show(Remitente $remitente)
    {
        return view('remitentes.show', [
            'remitente' => $remitente,
            'entradas' => Entrada::with(['consolidado', 'cliente'])->where('remitente_id', $remitente->id)->get(),
        ]);
    }

    public function edit(Remitente $remitente)
    {
        return view('remitentes.edit', [
            'remitente' => $remitente,
        ]);
    }

    public function update(RemitenteSaveRequest $request, Remitente $remitente)
    {
        if(! $this->updateRemitente($request, $remitente) )
            return back()->with('failure', 'Error al actualizar remitente');

        return back()->with('success', 'Remitente actualizado');
    }

    public function destroy(Remitente $remitente)
    {
        if(! $remitente->delete() )
            return back()->with('failure', 'Error al eliminar remitente');

        return redirect()->route('remitentes.index')->with('success', 'Remitente eliminado');
    }
}
