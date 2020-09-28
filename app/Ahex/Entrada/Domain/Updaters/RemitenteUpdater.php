<?php

namespace App\Ahex\Entrada\Domain\Updaters;

use App\Ahex\Fake\Domain\Fakeuser;

Class RemitenteUpdater extends Updater
{
    public $redirect;

    public function __construct($request, $entrada)
    {
        $this->validate($request);
        $this->fill( $request->all() );
        $this->entrada = $entrada;
        $this->redirect = route('entradas.show', $entrada);
    }

    public function validate($request)
    {
        $request->validate(
            [
                'remitente' => ['required', 'exists:remitentes,id']
            ],
            [
                'remitente.required' => 'Selecciona un remitente válido.',
                'remitente.exists'   => 'Selecciona un remitente existente.',
            ]
        );
    }

    public function fill($validated)
    {
        $this->data = [
            'remitente_id' => $validated['remitente'],
            'updated_by' => Fakeuser::live(),
        ];
    }

    public function message($saved)
    {
        if( ! $saved )
            return 'Error al agregar remitente';

        return 'Remitente agregado';
    }
}
