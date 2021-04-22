<?php

namespace App\Ahex\Printing\Application;

class EntradaRequest implements RequestSetupInterface
{
    public function rules()
    {
        return [
            'hoja' => [
                'nullable', 
                'in:etiqueta,etapas',
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
