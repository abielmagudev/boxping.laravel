<?php

namespace App\Ahex\Entrada\Application\Update\Validators;

class ReempaqueValidator extends Validator
{
    public function rules(): array
    {
        return [
            'codigo_reempacado' => ['required','integer','exists:codigosr,id'],
            'reempacador' => ['required','integer','exists:reempacadores,id'],
            'reempacado_fecha' => ['required','date'],
            'reempacado_hora' => ['required','date_format:H:i:s'],
        ];
    }

    public function messages(): array
    {
        return [
            'codigo_reempacado.required' => __('Selecciona el código de reempacado'),
            'codigo_reempacado.integer' => __('Selecciona el código de reempacado válido'),
            'codigo_reempacado.exists' => __('Selecciona el código de reempacado existente'),
            'reempacador.required' => __('Selecciona el reempacador'),
            'reempacador.integer' => __('Selecciona el reempacador válido'),
            'reempacador.exists' => __('Selecciona el reempacador existente'),
            'reempacado_fecha.required' => __('Selecciona la fecha de reempacado'),
            'reempacado_fecha.integer' => __('Selecciona la fecha de reempacado válido'),
            'reempacado_hora.required' => __('Selecciona la hora de reempacado'),
            'reempacado_hora.integer' => __('Selecciona la hora de reempacado válido'),
        ];
    }
}
