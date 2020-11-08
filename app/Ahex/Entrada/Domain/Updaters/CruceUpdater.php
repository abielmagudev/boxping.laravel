<?php

namespace App\Ahex\Entrada\Domain\Updaters;

use App\Ahex\Fake\Domain\Fakeuser;

Class CruceUpdater extends Updater
{
    public function rules()
    {
        return [
            'vehiculo' => ['required','integer','exists:vehiculos,id'],
            'conductor'=> ['required','integer','exists:conductores,id'],
            'vuelta' => ['required','integer'],
            'cruce_fecha' => ['required','date'],
            'cruce_hora' => ['required','date_format:H:i:s'],
        ];
    }

    public function messages()
    {
        return [
            'codigo_reempacado.required' => __('Selecciona el código de reempacado'),
            'codigo_reempacado.integer' => __('Selecciona el código de reempacado válido'),
            'reempacador.required' => __('Selecciona el reempacador'),
            'reempacador.integer' => __('Selecciona el reempacador válido'),
            'reempacado_fecha.required' => __('Selecciona la fecha de reempacado'),
            'reempacado_fecha.integer' => __('Selecciona la fecha de reempacado válido'),
            'reempacado_hora.required' => __('Selecciona la hora de reempacado'),
            'reempacado_hora.integer' => __('Selecciona la hora de reempacado válido'),
        ];
    }

    public function prepare($validated)
    {
        return [
            'vehiculo_id'  => $validated['vehiculo'],
            'conductor_id' => $validated['conductor'],
            'vuelta'       => $validated['vuelta'],
            'cruce_fecha'  => $validated['cruce_fecha'],
            'cruce_hora'   => $validated['cruce_hora'],
            'updated_by'   => Fakeuser::live(),
        ];
    }

    public function notification(bool $saved = true)
    {
        if(! $saved )
            return 'Error al actualizar cruce';

        return 'Cruce actualizado';
    }
}
