<?php

namespace App\Ahex\Entrada\Domain\Updaters;

use App\Ahex\Fake\Domain\Fakeuser;

Class RemitenteUpdater extends Updater
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
            'remitente' => ['required', 'exists:remitentes,id']
        ];
    }

    public function messages()
    {
        return [
            'remitente.required' => 'Selecciona un remitente válido.',
            'remitente.exists'   => 'Selecciona un remitente existente.',
        ];
    }

    public function prepare($validated)
    {
        return [
            'remitente_id' => $validated['remitente'],
            'updated_by' => Fakeuser::live(),
        ];
    }

    public function notification(bool $saved = true)
    {
        if(! $saved )
            return 'Error al agregar remitente';

        return 'Remitente agregado';
    }
}
