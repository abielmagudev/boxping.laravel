<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntradaEditRequest extends FormRequest
{
    private $forms;

    public function __construct()
    {
        parent::__construct();

        $this->forms = implode(',', ['entrada','cruce','reempaque']);
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
