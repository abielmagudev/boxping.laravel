<?php

namespace App\Ahex\Entrada\Domain\Updaters;

use App\Entrada;
use App\Ahex\Fake\Domain\Fakeuser;
use App\Http\Requests\EntradaUpdateRequest;

Class CruceUpdater extends Updater
{
    public function __construct(EntradaUpdateRequest $request, Entrada $entrada)
    {
        $this->validate($request);
        $this->fill( $request->all() );
        $this->entrada = $entrada;
    }

    public function validate(object $request)
    {
        $request->validate(
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
    }

    public function fill(array $validated)
    {
        $this->data = [
            'vehiculo_id'  => $validated['vehiculo'],
            'conductor_id' => $validated['conductor'],
            'vuelta'       => $validated['vuelta'],
            'cruce_fecha'  => $validated['cruce_fecha'],
            'cruce_hora'   => $validated['cruce_hora'],
            'updated_by'   => Fakeuser::live(),
        ];
    }

    public function message(bool $saved)
    {
        if( ! $saved )
            return 'Error al actualizar cruce';

        return 'Cruce actualizado';
    }
}
