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
