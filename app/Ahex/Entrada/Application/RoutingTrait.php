<?php 

namespace App\Ahex\Entrada\Application;

use App\Consolidado;

Trait RoutingTrait
{
    public function routeAfterStore($consolidado_id)
    {
        switch( request('siguiente', null) )
        {
            case 'crear':
                return $this->routeBackToCreate($consolidado_id);
                break;

            default:
                return $this->routeBackToFinish($consolidado_id);
        }
    }

    public function routeBackToCreate($consolidado_id)
    {
        return url()->previous();

        if($consolidado_id)
            return route('entradas.create', ['consolidado' => $consolidado_id]);
        
        return route('entradas.create');
    }

    public function routeBackToFinish($consolidado_id)
    {
        if($consolidado_id)
            return route('consolidados.show', $consolidado_id);

        return route('entradas.index');
    }

    public function routeAfterDestroy($consolidado_id)
    {
        if($consolidado_id)
            return route('consolidados.show', $consolidado_id);

        return route('entradas.index');
    }
}
