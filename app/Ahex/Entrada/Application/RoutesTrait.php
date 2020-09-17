<?php 

namespace App\Ahex\Entrada\Application;

Trait RoutesTrait
{
    public function routeCancel($id)
    {
        if( is_numeric($id) )
        {
            if( \App\Consolidado::where('id', $id)->exists() )
                return route('consolidados.show', $id);
        }

        return route('entradas.index');
    }

    public function routeAfterStore( $consolidado_id )
    {
        switch( request('siguiente', null) )
        {
            case 'agregar':
                return url()->previous();
                break;

            default:
                return $this->routeToTerminarAgregar( $consolidado_id );
        }
    }

    public function routeToAgregarMas($consolidado_id)
    {
        if( $consolidado_id )
            return route('entradas.create', ['consolidado' => $consolidado_id]);

        return route('entradas.create');
    }

    public function routeToTerminarAgregar($consolidado_id)
    {
        if( $consolidado_id )
            return route('consolidados.show', $consolidado_id);

        return route('entradas.index');
    }

    public function routeAfterDestroy($consolidado_id)
    {
        if( $consolidado_id )
            return route('consolidados.show', $consolidado_id);

        return route('entradas.index');
    }
}
