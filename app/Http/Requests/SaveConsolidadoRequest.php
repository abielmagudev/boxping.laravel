<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveConsolidadoRequest extends FormRequest
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
            'cliente' => ['required','numeric'],
            'numero'  => 'required',
            'tarimas' => ['required','numeric'],
            'notas'   => 'nullable',
            'cerrado' => 'numeric',
            'save'    => 'numeric',
        ];
    }

    public function messages()
    {
        return array(
            'numero.required'  => __('Ingresa el numero de consolidado'),
            'tarimas.required' => __('Ingresa la cantidad de tarimas del consolidado'),
            'tarimas.numeric'  => __('Ingresa la cantidad de tarimas del consolidado'),
            'cliente.required' => __('Selecciona el cliente del consolidado'),
            'cliente.numeric'  => __('Selecciona el cliente del consolidado'),
            'cerrado.numeric'  => __('Habilita o deshabilita cerrar consolidado'),
            'save.numeric'     => __('Selecciona una opcion para guardar el nuevo consolidado'),
        );
    }
}
