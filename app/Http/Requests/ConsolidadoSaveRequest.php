<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsolidadoSaveRequest extends FormRequest
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
            'cliente' => ['required','exists:clientes,id'],
            'numero'  => 'required',
            'tarimas' => ['required','numeric'],
            'notas'   => 'nullable',
            'cerrado' => ['sometimes', 'boolean'],
        ];
    }

    public function messages()
    {
        return array(
            'cliente.required' => __('Selecciona el cliente delconsolidado'),
            'cliente.exists'   => __('Selecciona un cliente válido para el consolidado'),
            'numero.required'  => __('Ingresa el numero de consolidado'),
            'tarimas.required' => __('Ingresa la cantidad de tarimas del consolidado'),
            'tarimas.numeric'  => __('Ingresa la cantidad de tarimas del consolidado'),
        );
    }
}
