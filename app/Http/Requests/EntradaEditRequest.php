<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntradaEditRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'formulario' => ['required','in:guia,reempaque,importacion']
        ];
    }

    public function messages()
    {
        return array(
            'formulario.required' => __('Se requiere una editor de información'),
            'formulario.in' => __('Selecciona un editor válido de información'),
        );
    }
}
