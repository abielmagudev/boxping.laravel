<?php

namespace App\Http\Controllers\Extended\Entrada;

use App\Http\Controllers\Extended\Abstracts\Updater;

use App\Consolidado;

class UpdaterEntrada extends Updater
{
    protected $request;
    protected $entrada;

    public function __construct($params)
    {
        $this->request = $params['request'];
        $this->entrada = $params['entrada'];
        $this->validate();
    }

    public function validate()
    {
        $this->request->validate([
                'consolidado' => ['nullable','exists:consolidados,id'],
                'consolidado_numero' => ['nullable','exists:consolidados,numero'],
                'cliente' => ['required','integer'],
                'numero' => ['required'],
                'cliente_alias_numero' => 'integer',
            ],
            [
                'consolidado.integer' => __('Selecciona un consolidado válido'),
                'consolidado.exists' => __('Selecciona un consolidado válido'),
                'consolidado_numero.exists' => __('Escribe un número de consolidado válido'),
                'cliente.required' => __('Selecciona un cliente'),
                'cliente.integer' => __('Selecciona un cliente'),
                'numero.required' => __('Escribe el número de entrada'),
                'cliente_alias_numero.integer' => __('Activa o desactiva alias del cliente'),
            ]
        );
    }

    protected function assignment()
    {
        $consolidado = $this->hasConsolidadoNumero() ? $this->getConsolidadoNumero() : null;

        return [
            'numero'  => $this->request->get('numero'),
            'consolidado_id' => $consolidado->id ?? null,
            'cliente_id' => $consolidado->cliente_id ?? $this->request->get('cliente'),
            'cliente_alias_numero' => $this->request->input('cliente_alias_numero', 0),
            'updated_by_user' => rand(1,10),
        ];
    }

    public function save()
    {        
        return $this->entrada->fill( $this->assignment() )->save();
    }

    public function message($saved)
    {
        return $saved ? 'Entrada actualizada.' : 'Error al actualizar la entrada.';
    }



    private function hasConsolidadoNumero()
    {
        return $this->request->has('consolidado_numero') && is_string($this->request->get('consolidado_numero'));
    }

    private function getConsolidadoNumero()
    {
        return \App\Consolidado::where('numero', $this->request->get('consolidado_numero'))
                                ->where('cerrado', 0)
                                ->first();
    }
}