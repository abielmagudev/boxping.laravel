<?php

namespace App\Ahex\Remitente\Application;

Trait RoutingTrait
{
    private function routeGoback($entrada_id, $remitente_id = false)
    {
        if( is_numeric($entrada_id)  )
            return route('entradas.show', $entrada_id);

        if( is_numeric($remitente_id) )
            return route('remitentes.show', $remitente_id);

        return route('remitentes.index');
    }

    private function routeAfterStore($entrada_id, $remitente_value)
    {
        if( ! $entrada_id )
            return route('remitentes.index');

        return route('entradas.agregar.remitente', [
            'entrada' => $entrada_id,
            'search' => $remitente_value, 
        ]);
    }
}
