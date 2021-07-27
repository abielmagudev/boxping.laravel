<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RemitenteSaveRequest extends FormRequest
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
            'postal' => 'nullable',
            'ciudad' => 'nullable',
            'estado' => 'nullable',
            'pais' => 'required',
            'telefono' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => __('Escribe el nombre'),
            'direccion.required' => __('Escribe la direccion'),
            'pais.required' => __('Escribe el pais'),
        ];
    }
}
