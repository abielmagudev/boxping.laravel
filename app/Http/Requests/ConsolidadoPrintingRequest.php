<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsolidadoPrintingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

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
