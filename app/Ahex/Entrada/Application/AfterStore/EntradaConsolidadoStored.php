<?php

namespace App\Ahex\Entrada\Application\AfterStore;

class EntradaConsolidadoStored extends Steps
{
    protected $steps = [
        'agregar' => 'toAdd',
        'finalizar' => 'toFinish',
    ];

    public function toAdd()
    {
        return redirect()->route('entradas.create', ['consolidado' => $this->model->consolidado_id]);
    }

    public function toFinish()
    {
        return redirect()->route('consolidados.show', $this->model->consolidado_id);
    }
}
