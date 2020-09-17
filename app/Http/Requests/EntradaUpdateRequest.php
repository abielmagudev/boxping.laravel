<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntradaUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'actualizar' => ['required', 'in:' . $this->getUpdaters()],
        ];
    }

    public function messages()
    {
        return [
            'actualizar.required' => __('Actualización de entrada requerida'),
            'actualizar.in' => __('Actualización de entrada no válida'),
        ];
    }

    private function getUpdaters()
    {
        return implode(',', [
            'cruce',
            'destinatario',
            'entrada',
            'reempaque',
            'remitente',
            'verificacion', 
        ]);
    }
}
