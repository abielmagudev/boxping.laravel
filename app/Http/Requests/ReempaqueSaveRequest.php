<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReempaqueSaveRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        if( $this->filled('clave') )
            $this->merge(['clave' => sha1($this->clave)]);

        // Seeder = sha1(12345);
    }

    public function rules()
    {
        return [
            'numero' => ['required', 'exists:entradas,numero'],
            'codigor' => ['required', 'exists:codigosr,id'],
            'clave' => ['required', 'exists:reempacadores,clave'],
        ];
    }

    public function messages()
    {
        return [
            'numero.required' => __('Introduce el número de entrada'),
            'numero.exists' => __('Número de entrada no existe'),
            'codigor.required' => __('Selecciona el código de reempacado'),
            'codigor.exists' => __('Selecciona un código de reempacado válido'),
            'clave.required' => __('Introduce la clave de reempacador'),
            'clave.exists' => __('Clave de reempacador no válido'),
        ];
    }
}
