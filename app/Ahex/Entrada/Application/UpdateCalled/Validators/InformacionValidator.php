<?php

namespace App\Ahex\Entrada\Application\UpdateCalled\Validators;

class InformacionValidator extends Validator
{
    public function rules(): array
    {
        return [
            'consolidado_numero' => [
                'nullable',
                'exists:consolidados,numero,status,abierto',
                # Rule::unique('consolidados', 'numero')->where('status','abierto')->ignore($this->entrada->consolidado_id),
            ],
            'cliente' => ['required_if:consolidado_numero,null','exists:clientes,id'],
            'numero' => ['required','unique:entradas,numero,' . $this->entrada->id],
            'contenido' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'consolidado_numero.exists' => __('Escribe un número de consolidado válido y abierto'),
            # 'consolidado_numero.unique' => __('Escribe un número de consolidado válido y abierto'),
            'cliente.required_if' => __('Selecciona el cliente'),
            'cliente.exists' => __('Selecciona un cliente válido.'),
            'numero.required' => __('Escribe el número de entrada'),
            'numero.unique' => __('Escribe un número de entrada diferente'),
        ];
    }
}
