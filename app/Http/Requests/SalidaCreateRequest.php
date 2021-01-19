<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalidaCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'entrada' => ['required','exists:entradas,id','unique:salidas,entrada_id'],
        ];
    }

    public function messages()
    {
        return [
            'required' => __('Selecciona una entrada válida'),
            'exists' => __('Selecciona una entrada existente'),
            'unique' => __('Entrada ya contiene guía de salida'),
        ];
    }
}
