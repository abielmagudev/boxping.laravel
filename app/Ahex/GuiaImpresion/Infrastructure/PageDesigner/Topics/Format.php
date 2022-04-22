<?php

namespace App\Ahex\GuiaImpresion\Infrastructure\PageDesigner\Topics;

trait Format
{
    public function width()
    {
        return $this->guide->formato->ancho . $this->guide->formato->medicion;
    }

    public function height()
    {
        return $this->guide->formato->alto . $this->guide->formato->medicion;
    }

    public function dimensions()
    {
        return "{$this->width()} {$this->height()}";
    }

    public function margins()
    {
        foreach(['arriba','derecha','abajo','izquierda'] as $edge)
        {
            $margins[] = isset($this->guide->margenes->$edge) 
                        ? $this->guide->margenes->$edge . $this->guide->margenes->medicion 
                        : 'auto';
        }

        return implode(' ', $margins);
    }
}
