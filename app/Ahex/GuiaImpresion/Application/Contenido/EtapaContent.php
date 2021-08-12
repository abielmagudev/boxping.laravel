<?php

namespace App\Ahex\GuiaImpresion\Application\Contenido;

use App\Etapa;

class EtapaContent
{
    public $name = 'etapa';
    
    public $attributes = [];
    
    public function __construct()
    {
        $self = $this;

        Etapa::all()->each( function ($item) use ($self) {
            $self->attributes[$item->slug] = $item->nombre;
        });
    }
}
