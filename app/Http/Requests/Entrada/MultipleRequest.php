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
            'entradas.required' => __('Selecciona una ó varias entradas'),
            'entradas.array' => __('Selecciona una ó varias entradas válidas'),
        ];
    }
}
