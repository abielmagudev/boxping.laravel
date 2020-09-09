<?php

namespace App\Ahex\Entrada\Application\Update\Updaters;

use App\Ahex\Fake\Domain\Fakeuser;

Class RemitenteUpdater extends Updater
{
    public function validate()
    {
        $this->request->validate(
            [
                'remitente' => ['required', 'exists:remitentes,id']
            ],
            [
                'remitente.required' => 'Selecciona un remitente válido.',
                'remitente.exists'   => 'Selecciona un remitente existente.',
            ]
        );
        
        return $this;
    }

    public function values()
    {
        return [
            'remitente_id' => $this->request->remitente,
            'updated_by_user' => Fakeuser::live(),
        ];
    }

    public function redirect($saved)
    {
        if( ! $saved )
            return back()->with('failure', 'Error al agregar remitente');

        return redirect()->route('entradas.show', $this->entrada)->with('success', 'Remitente agregado');
    }
}
