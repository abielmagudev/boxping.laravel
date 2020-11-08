<?php

namespace App\Ahex\Entrada\Domain\Updaters;

use App\Entrada;
use App\Consolidado;
use Illuminate\Validation\Rule;

Class EntradaUpdater extends Updater
{
    public function rules()
    {
        return [
            'consolidado_numero' => [
                'nullable',
                Rule::unique('consolidados', 'numero')->where('abierto',0)->ignore($this->entrada->consolidado_id),
            ],
            'cliente' => ['required_if:consolidado_numero,null','exists:clientes,id'],
            'numero' => ['required','unique:entradas,numero,' . $this->entrada->id],
            'cliente_alias_numero' => ['sometimes','accepted'],
        ];
    }

    public function messages()
    {
        return [
            'consolidado_numero.unique' => __('Escribe un número de consolidado válido y abierto'),
            'cliente.required_without' => __('Selecciona un cliente'),
            'cliente.exists' => __('Selecciona un cliente válido.'),
            'numero.required' => __('Escribe el número de entrada'),
            'numero.unique' => __('Escribe un número de entrada diferente'),
            'cliente_alias_numero.accepted' => __('Activa o desactiva la opción del alias del cliente en el número de entrada'),
        ];
    }

    public function prepare($validated)
    {
        return Entrada::prepare($validated);
    }
    
    public function notification(bool $saved = true)
    {
        if(! $saved )
            return 'Error al actualizar entrada';

        return 'Entrada actualizada';
    }
}
