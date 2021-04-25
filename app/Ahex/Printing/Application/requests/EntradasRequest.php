<?php

namespace App\Ahex\Printing\Application\Requests;

class EntradasRequest implements RequestSetupInterface
{
    public function rules()
    {
        return [
            'lista' => [
                'required',
            ],
            'hoja' => [
                'nullable', 
                'in:etiqueta,etapas',
            ],
        ];
    }

    public function messages()
    {
        return [
            'lista.required' => __('Selecciona una o más entradas para de impresión.'),
            'hoja.in' => __('Selecciona un contenido válido de impresión.'),
        ];
    }
}
