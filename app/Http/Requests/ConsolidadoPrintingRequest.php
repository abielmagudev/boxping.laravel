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
            'lista' => [
                'required_if:hoja,entradas,etiquetas,etapas',
                'array',
            ],
            'lista.*' => 'exists:entradas,id',
        ];
    }

    public function messages()
    {
        return [
            'hoja.in' => __('Selecciona una hoja de impresión válida.'),
            'lista.required_if' => __('Selecciona una o varias entradas para impresión.'),
            'lista.array' => __('Selecciona una lista válida de entradas para impresión.'),
            'lista.*.exists' => __('Selecciona guías de entradas válidas para impresión'),
        ];
    }
}
