<?php

namespace App\Ahex\Entrada\Domain\Updaters;

use App\Ahex\Fake\Domain\Fakeuser;

Class ReempaqueUpdater extends Updater
{
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
                'codigo_reempacado.integer' => __('Selecciona el código de reempacado válido'),
                'reempacador.required' => __('Selecciona el reempacador'),
                'reempacador.integer' => __('Selecciona el reempacador válido'),
                'reempacado_fecha.required' => __('Selecciona la fecha de reempacado'),
                'reempacado_fecha.integer' => __('Selecciona la fecha de reempacado válido'),
                'reempacado_hora.required' => __('Selecciona la hora de reempacado'),
                'reempacado_hora.integer' => __('Selecciona la hora de reempacado válido'),
            ]
        );
        
        return $this;
    }

    public function values()
    {
        return [
            'codigor_id' => $this->request->codigo_reempacado,
            'reempacador_id' => $this->request->reempacador,
            'reempacado_fecha' => $this->request->reempacado_fecha,
            'reempacado_hora' => $this->request->reempacado_hora,
            'updated_by_user' => Fakeuser::live(),
        ];
    }

    public function redirect($saved)
    {
        if( ! $saved )
            return back()->with('failure', 'Error al actualizar reempaque');

        return back()->with('success', 'Reempaque actualizado');
    }
}
