<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntradaEditRequest extends FormRequest
{
    private $forms;

    public function prepareForValidation()
    {
        $this->forms = implode(',', ['entrada','reempaque','importacion']);
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'formulario' => ['required','in:' . $this->forms]
        ];
    }

    public function messages()
    {
        return array(
            'formulario.required' => __('Se requiere una editor de información'),
            'formulario.in' => __('Selecciona un editor valido de información'),
        );
    }
}
