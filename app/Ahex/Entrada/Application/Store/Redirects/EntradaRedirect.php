<?php

namespace App\Ahex\Entrada\Application\Store\Redirects;

class EntradaRedirect
{
    public function agregar()
    {
        $inputs = request()->except([
            'numero',
            'contenido',
        ]);

        return redirect()->route('entradas.create')->withInput($inputs);
    }

    public function crear()
    {
        return redirect()->route('entradas.create');
    }

    public function finalizar()
    {
        return redirect()->route('entradas.index');
    }
}
