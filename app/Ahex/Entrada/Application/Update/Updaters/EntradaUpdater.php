<?php

namespace App\Ahex\Entrada\Application\Update\Updaters;

use App\Consolidado;
use App\Ahex\Fake\Domain\Fakeuser;

Class EntradaUpdater extends Updater
{
    public function validate()
    {
        $this->request->validate(
            [
                'consolidado' => ['nullable','exists:consolidados,id'],
                'consolidado_numero' => ['nullable','exists:consolidados,numero'],
                'cliente' => ['required','integer'],
                'numero' => ['required'],
                'cliente_alias_numero' => 'integer',
                'recibido' => 'integer',
            ],
            [
                'consolidado.integer' => __('Selecciona un consolidado válido'),
                'consolidado.exists' => __('Selecciona un consolidado existente'),
                'consolidado_numero.exists' => __('Escribe un número de consolidado válido'),
                'cliente.required' => __('Selecciona un cliente'),
                'cliente.integer' => __('Selecciona un cliente válido.'),
                'numero.required' => __('Escribe el número de entrada'),
                'cliente_alias_numero.integer' => __('Activa o desactiva la opción del alias del cliente'),
                'recibido.integer' => __('Activa o desactiva la opción de recibido'),
            ]
        );
        
        return $this;
    }

    public function values()
    {
        $consolidado = $this->getConsolidado();

        return [
            'numero'               => $this->request->numero,
            'consolidado_id'       => $consolidado->id ?? null,
            'cliente_id'           => $consolidado->cliente_id ?? $this->request->cliente,
            'cliente_alias_numero' => $this->request->input('cliente_alias_numero', 0),
            'recibido_at'          => $this->request->filled('recibido') ? now() : null,
            'recibido_by_user'     => $this->request->filled('recibido') ? Fakeuser::live() : null,
            'updated_by_user'      => Fakeuser::live(),
        ];
    }

    public function redirect($saved)
    {
        if( ! $saved )
            return back()->with('failure', 'Error al actualizar entrada');

        return back()->with('success', 'Entrada actualizada');
    }

    private function getConsolidado()
    {
        if( ! $this->request->filled('consolidado_numero') )
            return null;

        $numero = $this->request->consolidado_numero;
        return Consolidado::where('numero', $numero)->where('cerrado', 0)->first();
    }
}
