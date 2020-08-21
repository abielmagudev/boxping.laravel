<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntradaStoreRequest extends FormRequest
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
            'consolidado'          => ['integer','exists:consolidados,id'],
            'consolidado_numero'   => ['nullable','exists:consolidados,numero'],
            'cliente'              => ['required','integer'],
            'cliente_alias_numero' => 'integer',
            'numero'               => 'required',
        ];
    }

    public function messages()
    {
        return [
            'consolidado.integer'       => __('Selecciona un consolidado valido'),
            'consolidado.exists'        => __('Selecciona un consolidado valido'),
            'consolidado_numero.exists' => __('Escribe un número de consolidado valido'),
            'cliente.required'          => __('Selecciona un cliente'),
            'cliente.integer'           => __('Selecciona un cliente'),
            'cliente_alias_numero.integer' => __('Activa o desactiva la opcion número con alias'),
            'numero.required'           => __('Escribe el numero de la entrada'),          
        ];
    }
}
