<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DestinatarioCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'entrada' => [
                'required', 
                'unique:destinatarios,entrada_id', 
                'exists:entradas,id',
            ]
        ];
    }

    public function messages()
    {
        return [
            'entrada.required' => __('Require una entrada válida para el destinatario.'),
            'entrada.unique'   => __('Entrada puede contenter solamente un destinatario.'),
            'entrada.exists'   => __('Selecciona una entrada válida para el destinatario.'),
        ];
    }
}
