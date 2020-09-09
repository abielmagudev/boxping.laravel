<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntradaEditRequest extends FormRequest
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
            'formulario' => ['required','in:entrada,cruce,reempaque']
        ];
    }

    public function messages()
    {
        return array(
            'formulario.required' => __('Edición de entrada no valido'),
            'formulario.in' => __('Edición de entrada no valido'),
        );
    }
}
