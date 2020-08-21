<?php

namespace App\Http\Controllers\Extended\Entrada;

use App\Http\Controllers\Extended\Abstracts\Updater;

class UpdaterReempaque extends Updater
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
        $this->request->validate(
            [
                'codigo_reempacado' => ['required','integer'],
                'reempacador' => ['required','integer'],
                'reempacado_fecha' => ['required','date'],
                'reempacado_hora' => ['required','date_format:H:i:s'],
            ], 
            [
                'codigo_reempacado.required' => __('Selecciona el código de reempacado'),
                'codigo_reempacado.integer' => __('Selecciona el código de reempacado'),
                'reempacador.required' => __('Selecciona el reempacador'),
                'reempacador.integer' => __('Selecciona el reempacador'),
                'reempacado_fecha.required' => __('Selecciona la fecha de reempacado'),
                'reempacado_fecha.integer' => __('Selecciona la fecha de reempacado'),
                'reempacado_hora.required' => __('Selecciona la hora de reempacado'),
                'reempacado_hora.integer' => __('Selecciona la hora de reempacado'),
            ]
        );
    }

    protected function assignment()
    {
        return [
            'codigor_id' => $this->request->get('codigo_reempacado'),
            'reempacador_id' => $this->request->get('reempacador'),
            'reempacado_fecha' => $this->request->get('reempacado_fecha'),
            'reempacado_hora' => $this->request->get('reempacado_hora'),
            'updated_by_user' => rand(1,10),
        ];
    }

    public function save()
    {        
        return $this->entrada->fill( $this->assignment() )->save();
    }

    public function message($saved)
    {
        return $saved ? 'Reempaque de la entrada actualizado.' : 'Error al actualizar reempaque de la entrada.';
    }
}
