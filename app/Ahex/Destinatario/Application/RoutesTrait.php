<?php

namespace App\Ahex\Destinatario\Application;

use App\Entrada;

Trait RoutesTrait
{
    public function routeCancel()
    {
        if( request()->has('entrada') )
            return $this->routeEntrada();

        return route('destinatarios.index');
    }

    public function routeBack($destinatario_id)
    {
        if( request()->has('entrada') )
            return $this->routeEntrada();
        
        return route('destinatarios.show', $destinatario_id);
    }

    public function routeEntrada()
    {
        return route('entradas.show', request('entrada'));
    }

    public function routeAfterStore($destinatario_value)
    {
        if( ! request()->filled('entrada') )
            return route('destinatarios.index');

        return route('entradas.agregar.destinatario', [
            'entrada' => request('entrada'),
            'search' => $destinatario_value,
        ]);
    }
}
