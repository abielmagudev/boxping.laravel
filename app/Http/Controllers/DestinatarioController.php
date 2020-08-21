<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DestinatarioCreateRequest;
use App\Http\Requests\DestinatarioSaveRequest;

use App\Entrada;
use App\Destinatario;

class DestinatarioController extends Controller
{
    use Traits\Userlive,
        Traits\DestinatarioSave;

    public function create(DestinatarioCreateRequest $request)
    {
        return view('destinatarios.create', [
            'entrada' => Entrada::find( $request->entrada ),
            'destinatario' => new Destinatario,
        ]);
    }

    public function store(DestinatarioSaveRequest $request)
    {
        if(! $destinatario = $this->storeDestinatario($request) )
            return back()->with('failure','Error al agregar destinatario');
        
        return redirect()
                ->route('entradas.show', $destinatario->entrada_id)
                ->with('success', 'Destinatario agregado');
    }

    public function edit(Destinatario $destinatario)
    {
        return view('destinatarios.edit', [
            'entrada' => Entrada::find( $destinatario->entrada_id ),
            'destinatario' => $destinatario,
        ]);
    }

    public function update(DestinatarioSaveRequest $request, Destinatario $destinatario)
    {
        if(! $this->updateDestinatario($request, $destinatario) )
            return back()->with('failure', 'Error al actualizar destinatario');
        
        return back()->with('success', 'Destinatario actualizado');
    }
}
