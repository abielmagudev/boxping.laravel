<?php

namespace App\Ahex\GuiaImpresion\Domain;

trait Validations
{
    public function isReal()
    {
        return isset($this->id);
    }

    public function hasDescripcion()
    {
        return isset($this->descripcion);
    }

    public function hasTextoFinal()
    {
        return isset($this->texto_final);
    }

    public function isDesactivada()
    {
        return ! (bool) $this->activada;
    }

    public function isActivada()
    {
        return (bool) $this->activada;
    }

    public function hasContenido($type = null, $attr = null)
    {
        if( is_string($type) && is_string($attr) )
            return isset($this->contenido->{$type}->{$attr});

        if( is_string($type) )
            return isset($this->contenido->{$type});

        return isset($this->contenido);
    }
}
