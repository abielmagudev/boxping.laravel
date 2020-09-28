<?php

namespace App\Ahex\Entrada\Domain\Updaters;

use App\Ahex\Fake\Domain\Fakeuser;

Class ReempaqueUpdater extends Updater
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
    }

    public function fill($validate)
    {
        $this->data = [
            'codigor_id' => $validate['codigo_reempacado'],
            'reempacador_id' => $validate['reempacador'],
            'reempacado_fecha' => $validate['reempacado_fecha'],
            'reempacado_hora' => $validate['reempacado_hora'],
            'updated_by' => Fakeuser::live(),
        ];
    }

    public function message($saved)
    {
        if( ! $saved )
            return 'Error al actualizar reempaque';

        return 'Reempaque actualizado';
    }
}
