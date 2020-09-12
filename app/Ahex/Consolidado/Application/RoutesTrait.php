<?php

namespace App\Ahex\Consolidado\Application;

Trait RoutesTrait
{
    public function routeAfterStore($option, $consolidado_id)
    {
        switch( $option )
        {
            case 2:
                return route('entradas.create', ['consolidado' => $consolidado_id]);
                break;

            case 1:
                return route('consolidados.create');
                break;
                
            default:
                return route('consolidados.index');
        }
    }
}
