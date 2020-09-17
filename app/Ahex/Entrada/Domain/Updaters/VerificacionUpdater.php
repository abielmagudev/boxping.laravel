<?php

namespace App\Ahex\Entrada\Domain\Updaters;

use App\Ahex\Fake\Domain\Fakeuser;

Class VerificacionUpdater extends Updater
{
    public function __construct($request, $entrada)
    {
        $this->validate($request);
        $this->fill( $request->all() );
        $this->entrada = $entrada;
    }

    public function validate($request)
    {
        $request->validate(
            [
                'verificacion' => ['required','accepted'],
            ], 
            [
                'verificacion.required' => __('Activa la opción de verificación'),
                'verificacion.accepted' => __('Activa la opción válida de verificación'),
            ]
        );
    }

    public function fill($validated)
    {
        $this->data = [
            'verificado_at' => now(),
            'verificado_by_user' => Fakeuser::live(),
        ];
    }

    public function message($saved)
    {
        if( ! $saved )
            return 'Error al actualizar verificación';

        return 'Verificación actualizada';
    }
}
