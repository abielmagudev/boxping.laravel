<?php

namespace App\Ahex\Entrada\Application\AfterStore;

class EntradaStored extends Steps
{
    protected $steps = [
        'agregar' => 'toAdd',
        'crear' => 'toCreate',
        'finalizar' => 'toFinish',
    ];

    public function toAdd()
    {
        $inputs = request()->except([
            'numero',
            'contenido',
        ]);

        return redirect()->route('entradas.create')->withInput( $inputs );
    }

    public function toCreate()
    {
        return redirect()->route('entradas.create');
    }

    public function toFinish()
    {
        return redirect()->route('entradas.index');
    }
}
