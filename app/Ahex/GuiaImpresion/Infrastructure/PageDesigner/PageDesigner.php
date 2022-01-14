<?php

namespace App\Ahex\GuiaImpresion\Infrastructure\PageDesigner;

use App\GuiaImpresion;

class PageDesigner
{
    use CacheActions,
        FormatActions,
        InformationActions,
        TypographyActions;

    const DEFAULT_FONT_SIZE = 16;

    private $guide;
    
    public function __construct(GuiaImpresion $guia_impresion)
    {
        $this->guide = $guia_impresion;
    }

    public function __call($method, $arguments)
    {
        if(! method_exists($this->guide, $method) )
            return abort(500, 'Funcionalidad inválida de guia de impresion');

        return call_user_func_array([$this->guide, $method], $arguments);
    }

    public function __get($prop)
    {
        return $this->guide->$prop ?? null;
    }
}
