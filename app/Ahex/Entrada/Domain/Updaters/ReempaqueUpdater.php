<?php

namespace App\Ahex\Entrada\Domain\Updaters;

use App\Ahex\Fake\Domain\Fakeuser;

Class ReempaqueUpdater extends Updater
{
    public function rules()
    {
        return [
            'codigo_reempacado' => ['required','integer','exists:codigosr,id'],
            'reempacador' => ['required','integer','exists:reempacadores,id'],
            'reempacado_fecha' => ['required','date'],
            'reempacado_hora' => ['required','date_format:H:i:s'],
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

    public function prepare($validate)
    {
        return [
            'codigor_id' => $validate['codigo_reempacado'],
            'reempacador_id' => $validate['reempacador'],
            'reempacado_fecha' => $validate['reempacado_fecha'],
            'reempacado_hora' => $validate['reempacado_hora'],
            'updated_by' => Fakeuser::live(),
        ];
    }

    public function notification(bool $saved = true)
    {
        if(! $saved )
            return 'Error al actualizar reempaque';

        return 'Reempaque actualizado';
    }
}
