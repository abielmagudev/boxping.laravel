<?php

namespace App\Ahex\Destinatario\Application;

Trait RoutingTrait
{
    private function routeGoback($entrada_id, $destinatario_id = false)
    {
        if( is_numeric($entrada_id)  )
            return route('entradas.show', $entrada_id);

        if( is_numeric($destinatario_id) )
            return route('destinatarios.show', $destinatario_id);

        return route('destinatarios.index');
    }

    private function routeAfterStore($entrada_id, $destinatario_value)
    {
        if( ! $entrada_id )
            return route('destintarios.index');

        return route('entradas.agregar.destinatario', [
            'entrada' => $entrada_id,
            'search' => $destinatario_value, 
        ]);
    }
}
