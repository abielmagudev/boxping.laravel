<?php

namespace App\Ahex\GuiaImpresion\Domain;

trait Validations
{
    public function hasContenido($type = null, $attr = null)
    {
        if( is_string($type) && is_string($attr) )
            return isset($this->contenido->{$type}->{$attr});

        if( is_string($type) )
            return isset($this->contenido->{$type});

        return isset($this->contenido);
    }

    public function hasNotas()
    {
        return isset($this->notas);
    }
}
