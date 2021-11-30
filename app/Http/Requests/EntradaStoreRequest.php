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
            'numero' => ['bail','required','unique:entradas'],
            'consolidado' => ['bail','exists:consolidados,id,status,abierto'],
            'cliente' => ['required_without:consolidado','exists:clientes,id'],
            'contenido' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'numero.required' => __('Escribe el número de entrada'),          
            'numero.unique' => __('Escribe el número de entrada diferente'),          
            'consolidado.exists' => __('Selecciona un consolidado válido y abierto'),
            'cliente.exists' => __('Selecciona un cliente válido'),
            'cliente.required_without' => __('Selecciona un cliente'),
        ];
    }
}
