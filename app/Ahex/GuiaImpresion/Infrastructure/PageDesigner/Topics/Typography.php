<?php

namespace App\Ahex\GuiaImpresion\Infrastructure\PageDesigner\Topics;

trait Typography
{
    public function textAlign()
    {
        return $this->guide->tipografia->alineacion;
    }

    public function fontName()
    {
        return $this->guide->tipografia->fuente;
    }

    public function fontSize()
    {
        return $this->guide->tipografia->tamano . $this->guide->tipografia->medicion;
    }
}
