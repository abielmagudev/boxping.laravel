<?php

namespace App\Ahex\Entrada\Application\Update\Updaters;

use App\Ahex\Fake\Domain\Fakeuser;

Class VerificacionUpdater extends Updater
{
    public function validate()
    {
        $this->request->validate(
            [
                'verificacion' => ['required','accepted'],
            ], 
            [
                'verificacion.required' => __('Activa la opción de verificación'),
                'verificacion.accepted' => __('Activa la opción válida de verificación'),
            ]
        );
        
        return $this;
    }

    public function values()
    {
        return [
            'verificado_at' => now(),
            'verificado_by_user' => Fakeuser::live(),
        ];
    }

    public function redirect($saved)
    {
        if( ! $saved )
            return back()->with('failure', 'Error al actualizar verificación');

        return back()->with('success', 'Verificación actualizado');
    }
}
