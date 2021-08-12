<?php

namespace App\Ahex\Entrada\Application\Update\Validators;

class InformacionValidator extends Validator
{
    public function rules(): array
    {
        return [
            'consolidado_numero' => [
                'nullable',
                'exists:consolidados,numero,status,abierto',
                // Rule::unique('consolidados', 'numero')->where('status','abierto')->ignore($this->entrada->consolidado_id),
            ],
            'cliente' => ['required_if:consolidado_numero,null','exists:clientes,id'],
            'numero' => ['required','unique:entradas,numero,' . $this->entrada->id],
            'cliente_alias_numero' => ['sometimes','accepted'],
            'contenido' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'consolidado_numero.exists' => __('Escribe un número de consolidado válido y abierto'),
            // 'consolidado_numero.unique' => __('Escribe un número de consolidado válido y abierto'),
            'cliente.required_without' => __('Selecciona un cliente'),
            'cliente.exists' => __('Selecciona un cliente válido.'),
            'numero.required' => __('Escribe el número de entrada'),
            'numero.unique' => __('Escribe un número de entrada diferente'),
            'cliente_alias_numero.accepted' => __('Activa o desactiva la opción del alias del cliente en el número de entrada'),
        ];
    }
}
