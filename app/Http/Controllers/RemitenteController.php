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

    public function create(RemitenteCreateRequest $request)
    {
        return view('remitentes.create', [
            'entrada'   => Entrada::find($request->entrada),
            'remitente' => new Remitente,
        ]);
    }

    public function store(RemitenteSaveRequest $request)
    {
        if(! $remitente = $this->storeRemitente($request) )
            return back()->with('failure', 'Error al agregar remitente');

        return redirect()
                ->route('entradas.show', $remitente->entrada_id)
                ->with('success', 'Remitente agregado');
    }

    public function edit(Remitente $remitente)
    {
        return view('remitentes.edit', [
            'entrada' => Entrada::find($remitente->entrada_id),
            'remitente' => $remitente,
        ]);
    }

    public function update(RemitenteSaveRequest $request, Remitente $remitente)
    {
        if(! $this->updateRemitente($request, $remitente) )
            return back()->with('failure', 'Error al actualizar remitente');

        return back()->with('success', 'Remitente actualizado');
    }
}
