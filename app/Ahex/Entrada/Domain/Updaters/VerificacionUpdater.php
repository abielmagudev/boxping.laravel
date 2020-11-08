<?php

namespace App\Ahex\Entrada\Domain\Updaters;

use App\Ahex\Fake\Domain\Fakeuser;

Class VerificacionUpdater extends Updater
{
    public function rules()
    {
        return [
            'verificacion' => ['required','accepted'],
        ];
    }

    public function messages()
    {
        return [
            'verificacion.required' => __('Activa la opción de verificación'),
            'verificacion.accepted' => __('Activa la opción válida de verificación'),
        ];
    }
    
    public function prepare($validated)
    {
        return [
            'verificado_by' => Fakeuser::live(),
            'verificado_at' => now(),
            'updated_by' => Fakeuser::live(),
        ];
    }

    public function notification($saved = true)
    {
        if(! $saved )
            return 'Error al actualizar verificación';

        return 'Verificación actualizada';
    }
}
