<?php

namespace App\Ahex\Entrada\Domain\Updaters;

use App\Entrada;
use App\Ahex\Fake\Domain\Fakeuser;

Class DestinatarioUpdater extends Updater
{
    public $redirect;

    public function __construct($request, $entrada)
    {
        $this->entrada = $entrada;
        $this->validate( $request );
        $this->fill( $request->all() );
        $this->redirect = route('entradas.show', $entrada);
    }

    public function validate($request)
    {
        $request->validate(
            [
                'destinatario' => ['required', 'exists:destinatarios,id']
            ],
            [
                'destinatario.required' => 'Selecciona un destinatario válido.',
                'destinatario.exists'   => 'Selecciona un destinatario existente.',
            ]
        );
    }

    public function fill($validated)
    {
        $this->data = [
            'destinatario_id' => $validated['destinatario'],
            'verificado_at' => null,
            'verificado_by_user' => null,
            'updated_by_user' => Fakeuser::live(),
        ];
    }

    public function message($saved)
    {
        if( ! $saved )
            return 'Error al agregar destinatario';

        return 'Destinatario agregado';
    }
}
