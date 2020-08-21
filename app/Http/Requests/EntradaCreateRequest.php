<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntradaCreateRequest extends FormRequest
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
            'consolidado' => 'integer|exists:consolidados,id'
        ];
    }

    public function messages()
    {
        return array(
            'consolidado.integer' => __('Selecciona un consolidado válido'),
            'consolidado.exists' => __('Selecciona un consolidado válido'),
        );
    }
}
