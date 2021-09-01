<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntradaPrintMultipleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'guia' => ['required','exists:guias_impresion,id'],
            'entradas' => ['required','array'],
        ];
    }

    public function messages()
    {
        return [
            'guia.required' => __('Selecciona una guía de impresión.'),
            'guia.exists' => __('Selecciona una guía de impresión válida'),
            'entradas.required' => __('Selecciona las entradas a imprimir'),
            'entradas.array' => __('Selecciona las entradas válidas para imprimir'),
        ];
    }
}
