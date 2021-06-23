<?php

namespace App\Ahex\Entrada\Application\AfterStore;

class EntradaConsolidadoStored extends Stored
{
    protected $redirects = [
        'agregar' => 'toAdd',
        'finalizar' => 'toFinish',
    ];

    public function toAdd()
    {
        $inputs = request()->except([
            'numero',
            'contenido',
        ]);

        return redirect()->route('entradas.create', ['consolidado' => $this->entrada->consolidado_id])->withInput($inputs);
    }

    public function toFinish()
    {
        return redirect()->route('consolidados.show', $this->entrada->consolidado_id);
    }
}
