<?php

namespace App\Ahex\Entrada\Domain\Updaters;

use App\Ahex\Fake\Domain\Fakeuser;

Class ConfirmacionUpdater extends Updater
{
    public function rules()
    {
        return [
            'confirmado' => ['required','accepted'],
        ];
    }

    public function messages()
    {
        return [
            'confirmado.required' => __('Activa la opción de verificación'),
            'confirmado.accepted' => __('Activa la opción válida de verificación'),
        ];
    }
    
    public function prepare($validated)
    {
        return [
            'confirmado_by' => Fakeuser::live(),
            'confirmado_at' => now(),
            'updated_by' => Fakeuser::live(),
        ];
    }

    public function notification($saved = true)
    {
        if(! $saved )
            return 'Error al actualizar confirmación';

        return 'Confirmación de la entrada actualizada';
    }
}
