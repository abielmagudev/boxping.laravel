<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DestinatarioSaveRequest extends FormRequest
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
            'nombre' => 'required',
            'direccion' => 'required',
            'codigo_postal' => 'required',
            'ciudad' => 'required',
            'estado' => 'required',
            'pais' => 'required',
            'referencias' => 'nullable',
            'telefono' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => __('Escribe el nombre'),
            'direccion.required' => __('Escribe la direccion'),
            'codigo_postal.required' => __('Escribe el código postal'),
            'ciudad.required' => __('Escribe la ciudad'),
            'estado.required' => __('Escribe el estado'),
            'pais.required' => __('Escribe el pais'),
            'telefono.required' => __('Escribe el telefono'),
        ];
    }
}
