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
            'consolidado' => 'exists:consolidados,id',
            'cliente' => 'exists:clientes,id',
        ];
    }

    public function messages()
    {
        return array(
            'consolidado.exists' => __('Selecciona un consolidado válido'),
            'cliente.exists' => __('Selecciona un cliente válido'),
        );
    }
}
