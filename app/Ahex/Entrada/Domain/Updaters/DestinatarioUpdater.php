<?php

namespace App\Ahex\Entrada\Domain\Updaters;

use App\Entrada;
use App\Ahex\Fake\Domain\Fakeuser;

Class DestinatarioUpdater extends Updater
{
    public $redirect;

    public function __construct($entrada)
    {
        parent::__construct($entrada);
        $this->redirect = route('entradas.show', $entrada);
    }

    public function rules()
    {
        return [
            'destinatario' => ['required', 'exists:destinatarios,id']
        ];
    }

    public function messages()
    {
        return [
            'destinatario.required' => 'Selecciona un destinatario válido.',
            'destinatario.exists'   => 'Selecciona un destinatario existente.',
        ];
    }

    public function prepare($validated)
    {
        return [
            'destinatario_id' => $validated['destinatario'],
            'verificado_by' => null,
            'verificado_at' => null,
            'updated_by' => Fakeuser::live(),
        ];
    }

    public function notification(bool $saved = true)
    {
        if(! $saved )
            return 'Error al agregar destinatario';

        return 'Destinatario de la entrada agregado';
    }
}
