<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntradasPrintingRequest extends FormRequest
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
                'in:etiqueta,etapas',
            ],
            'lista' => [
                'required',
                'array',
            ],
            'lista.*' => [
                'exists:entradas,id'
            ],
        ];
    }

    public function messages()
    {
        return [
            'hoja.in' => __('Selecciona una hoja válida de impresión.'),
            'lista.required' => __('Selecciona una o más entradas para la impresión.'),
            'lista.*.exists' => __('Selecciona guías de entradas que existan.'),
        ];
    }
}
