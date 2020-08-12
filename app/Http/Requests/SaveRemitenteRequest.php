<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveRemitenteRequest extends FormRequest
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
            'entrada' => ['required','integer'],
            'nombre' => 'required',
            'direccion' => 'required',
            'codigo_postal' => 'nullable',
            'ciudad' => 'required',
            'estado' => 'required',
            'pais' => 'required',
            'telefono' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'entrada.required' => __('Require una entrada valida para agregar remitente'),
            'entrada.integer' => __('Require una entrada valida para agregar remitente'),
            'nombre.required' => __('Escribe el nombre'),
            'direccion.required' => __('Escribe la direccion'),
            'ciudad.required' => __('Escribe la ciudad'),
            'estado.required' => __('Escribe el estado'),
            'pais.required' => __('Escribe el pais'),
        ];
    }
}
