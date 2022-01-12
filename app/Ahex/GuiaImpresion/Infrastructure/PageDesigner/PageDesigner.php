<?php

namespace App\Ahex\GuiaImpresion\Infrastructure\PageDesigner;

use App\GuiaImpresion;

class PageDesigner
{
    use CacheActions,
        FormatActions,
        InformantionActions,
        TypographyActions;

    const DEFAULT_FONT_SIZE = 16;

    private $guide;
    
    public function __construct(GuiaImpresion $guia_impresion)
    {
        $this->guide = $guia_impresion;
    }
}
