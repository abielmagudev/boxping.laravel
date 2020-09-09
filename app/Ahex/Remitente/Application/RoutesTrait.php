<?php

namespace App\Ahex\Remitente\Application;

Trait RoutesTrait
{
    public function routeCancel()
    {
        if( request()->has('entrada') )
            return $this->routeEntrada();

        return route('remitentes.index');
    }

    public function routeBack($remitente_id)
    {
        if( request()->has('entrada') )
            return $this->routeEntrada();
        
        return route('remitentes.show', $remitente_id);
    }

    public function routeEntrada()
    {
        return route('entradas.show', request('entrada'));
    }

    public function routeAfterStore($remitente_value)
    {
        if( ! request()->filled('entrada') )
            return route('entradas.index');
        
        return route('entradas.agregar.remitente', [
            'entrada' => request('entrada'),
            'search' => $remitente_value, 
        ]);
    }
}
