<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntradaStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'consolidado'          => 'exists:consolidados,id',
            'cliente'              => ['required_without:consolidado','exists:clientes,id'],
            'numero'               => 'required',
            'cliente_alias_numero' => ['sometimes','accepted'],
        ];
    }

    public function messages()
    {
        return [
            'consolidado.exists'       => __('Selecciona un consolidado válido'),
            'cliente.required_without' => __('Selecciona un cliente'),
            'cliente.exists'           => __('Selecciona un cliente válido'),
            'numero.required'          => __('Escribe el numero de la entrada'),          
            'cliente_alias_numero.accepted' => __('Activa o desactiva la opcion "Alias del cliente..."'),
        ];
    }
}
