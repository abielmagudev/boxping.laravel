<?php

namespace App\Ahex\Entrada\Application\Store\Redirects;

class EntradaConsolidadoRedirect
{
    private $consolidado_id;

    public function __construct($consolidado_id)
    {
        $this->consolidado_id = $consolidado_id;
    }

    public function agregar()
    {
        $inputs = request()->except([
            'numero',
            'contenido',
        ]);

        return redirect()->route('entradas.create', ['consolidado' => $this->consolidado_id])->withInput($inputs);
    }

    public function finalizar()
    {
        return redirect()->route('consolidados.show', $this->consolidado_id);
    }
}
