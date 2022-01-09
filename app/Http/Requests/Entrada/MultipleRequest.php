<?php

namespace App\Http\Requests\Entrada;

use Illuminate\Foundation\Http\FormRequest;

class MultipleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'entradas' => ['required','array'],
        ];
    }

    public function messages()
    {
        return [
            'entradas.required' => __('Selecciona las entradas a imprimir'),
            'entradas.array' => __('Selecciona las entradas válidas para imprimir'),
        ];
    }
}
