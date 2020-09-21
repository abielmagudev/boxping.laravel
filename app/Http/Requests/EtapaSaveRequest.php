<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtapaSaveRequest extends FormRequest
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
            'nombre' => ['required'],
            'descripcion' => 'nullable',
            'medicion' => ['required','boolean'],
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => __('Escribe el nombre'),
            'medicion.required' => __('Selecciona una opción de medición'),
        ];
    }
}
