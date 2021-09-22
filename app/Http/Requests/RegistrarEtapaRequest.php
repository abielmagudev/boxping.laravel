<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrarEtapaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'etapa' => ['exists:etapas,slug'],
        ];
    }

    public function messages()
    {
        return [
            'etapa.exists' => __('Selecciona una etapa válida para registrar'),
        ];
    }
}
