<?php

namespace App\Ahex\GuiaImpresion\Application\Contenido;

use App\Etapa;

class EtapasContent
{
    public $name = 'etapas';
    
    public $attributes = [];
    
    public function __construct()
    {
        $self = $this;

        Etapa::all()->each( function ($item) use ($self) {
            $self->attributes[$item->slug] = $item->nombre;
        });
    }
}
