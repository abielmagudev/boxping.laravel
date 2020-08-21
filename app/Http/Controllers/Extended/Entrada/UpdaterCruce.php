<?php

namespace App\Http\Controllers\Extended\Entrada;

use App\Http\Controllers\Extended\Abstracts\Updater;

class UpdaterCruce extends Updater
{
    protected $request;
    protected $entrada;

    public function __construct($params)
    {
        $this->request = $params['request'];
        $this->entrada = $params['entrada'];
        $this->validate();
    }

    public function validate()
    {
        $this->request->validate([
                'vehiculo' => ['required','integer'],
                'conductor'=> ['required','integer'],
                'vuelta' => ['required','integer'],
                'cruce_fecha' => ['required','date'],
                'cruce_hora' => ['required','date_format:H:i:s'],
            ],
            [
                'vehiculo.required' => __('Selecciona el vehiculo de cruce'),
                'vehiculo.integer'  => __('Selecciona el vehiculo de cruce'),
                'conductor.required' => __('Selecciona el conductor de cruce'),
                'conductor.integer'  => __('Selecciona el conductor de cruce'),
                'vuelta.required' => __('Escribe el número de vuelta del cruce'),
                'vuelta.integer'  => __('Escribe el número de vuelta del cruce'),
                'cruce_fecha.required' => __('Escribe la fecha de cruce'),
                'cruce_fecha.date' => __('Escribe la fecha de cruce'),
                'cruce_hora.required' => __('Escribe la hora de cruce'),
                'cruce_hora.date' => __('Escribe la hora de cruce'),
            ]
        );
    }

    protected function assignment()
    {
        return [
            'vehiculo_id'  => $this->request->get('vehiculo'),
            'conductor_id' => $this->request->get('conductor'),
            'vuelta'       => $this->request->get('vuelta'),
            'cruce_fecha'  => $this->request->get('cruce_fecha'),
            'cruce_hora'   => $this->request->get('cruce_hora'),
            'updated_by_user' => rand(1,10),
        ];
    }

    public function save()
    {        
        return $this->entrada->fill( $this->assignment() )->save();
    }

    public function message($saved)
    {
        return $saved ? 'Cruce de la entrada actualizado.' : 'Error al actualizar cruce de la entrada.';
    }
}