<?php

namespace App\Ahex\Printing\Application;

class ConsolidadoRequest implements RequestSetupInterface
{
    public function rules()
    {
        return [
            'hoja' => [
                'nullable', 
                'in:entradas,etiquetas,etapas',
            ],
        ];
    }

    public function messages()
    {
        return [
            'hoja.in' => __('Selecciona un contenido válido de impresión.'),
        ];
    }
}
