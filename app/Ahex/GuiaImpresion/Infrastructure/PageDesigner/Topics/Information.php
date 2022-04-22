<?php

namespace App\Ahex\GuiaImpresion\Infrastructure\PageDesigner\Topics;

use App\Ahex\GuiaImpresion\Application\InformantsMananger;

trait Information
{
    private $informants_validated = null;

    public function informantsMapped()
    {
        return array_map(
            fn($item) => preg_split('/[.]/', $item, 2),
            $this->guide->informacion_array
        );
    }
    
    public function informantsValidated()
    {
        $this->informants_validated = array_filter(
            $this->informantsMapped(), 
            fn($item) => isset($item[0], $item[1]) && InformantsMananger::has($item[0], $item[1])
        );

        return $this->informants_validated;
    }

    public function information(\App\Entrada $entrada)
    {
        return array_map(
            function ($informant) use ($entrada) { 
                return InformantsMananger::call($informant[0], $informant[1], $entrada);
            }, ($this->informants_validated ?? $this->informantsValidated())
        );
    }
}
