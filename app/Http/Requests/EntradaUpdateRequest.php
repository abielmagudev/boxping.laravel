<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntradaUpdateRequest extends FormRequest
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
            'update' => ['required', 'in:entrada,cruce,reempaque'],
        ];
    }

    public function messages()
    {
        return [
            'update.required' => __('Actualizacion de entrada no valida'),
            'update.in' => __('Actualizacion de entrada no valida'),
        ];
    }
}
