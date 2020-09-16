<?php

namespace App\Ahex\Entrada\Domain\Updaters;

use App\Ahex\Fake\Domain\Fakeuser;

Class CruceUpdater extends Updater
{
    public function validate()
    {
        $this->request->validate(
            [
                'vehiculo' => ['required','integer'],
                'conductor'=> ['required','integer'],
                'vuelta' => ['required','integer'],
                'cruce_fecha' => ['required','date'],
                'cruce_hora' => ['required','date_format:H:i:s'],
            ],
            [
                'vehiculo.required' => __('Selecciona el vehiculo'),
                'vehiculo.integer'  => __('Selecciona el vehiculo válido'),
                'conductor.required' => __('Selecciona el conductor'),
                'conductor.integer'  => __('Selecciona el conductor válido'),
                'vuelta.required' => __('Escribe el número de vuelta'),
                'vuelta.integer'  => __('Escribe el número de vuelta válido'),
                'cruce_fecha.required' => __('Escribe la fecha de cruce'),
                'cruce_fecha.date' => __('Escribe la fecha de cruce válido'),
                'cruce_hora.required' => __('Escribe la hora de cruce'),
                'cruce_hora.date' => __('Escribe la hora de cruce válido'),
            ]
        );
        
        return $this;
    }

    public function values()
    {
        return [
            'vehiculo_id'  => $this->request->vehiculo,
            'conductor_id' => $this->request->conductor,
            'vuelta'       => $this->request->vuelta,
            'cruce_fecha'  => $this->request->cruce_fecha,
            'cruce_hora'   => $this->request->cruce_hora,
            'updated_by_user' => Fakeuser::live(),
        ];
    }

    public function redirect($saved)
    {
        if( ! $saved )
            return back()->with('failure', 'Error al actualizar cruce');

        return back()->with('success', 'Cruce actualizado');
    }
}
