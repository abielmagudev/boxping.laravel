<?php

namespace App\Ahex\Entrada\Application\Update\Updaters;

use App\Ahex\Fake\Domain\Fakeuser;

Class DestinatarioUpdater extends Updater
{
    public function validate()
    {
        $this->request->validate(
            [
                'destinatario' => ['required', 'exists:destinatarios,id']
            ],
            [
                'destinatario.required' => 'Selecciona un destinatario válido.',
                'destinatario.exists'   => 'Selecciona un destinatario existente.',
            ]
        );
        
        return $this;
    }

    public function values()
    {
        return [
            'destinatario_id' => $this->request->destinatario,
            'verificado_at' => null,
            'verificado_by_user' => null,
            'updated_by_user' => Fakeuser::live(),
        ];
    }

    public function redirect($saved)
    {
        if( ! $saved )
            return back()->with('failure', 'Error al agregar destinatario');

        return redirect()->route('entradas.show', $this->entrada)->with('success', 'Destinatario agregado');
    }
}
