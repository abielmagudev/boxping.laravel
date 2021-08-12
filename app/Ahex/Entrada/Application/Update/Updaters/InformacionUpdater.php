<?php

namespace App\Ahex\Entrada\Application\Update\Updaters;

use Illuminate\Validation\Rule;
use App\Entrada;

class InformacionUpdater extends Updater
{
    public function rules()
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

    public function messages()
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

    public function prepare()
    {
        return Entrada::prepare($this->validated);
    }

    public function redirect()
    {
        $this->redirect = redirect()->route('entradas.edit', [$this->entrada, 'editor' => 'guia']);
        return $this;
    }

    public function failure()
    {
        return $this->redirect->with('failure', 'Error al actualizar la guía');
    }

    public function success()
    {
        return $this->redirect->with('success', 'Guía actualizada');
    }
}
