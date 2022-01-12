<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

class EtapaInformant extends Informant
{
    public static function getActionsLabels()
    {
        if(! $etapas = \App\Etapa::all() )
            return [];
    
        foreach($etapas as $etapa) 
            $attributes[$etapa->slug] = $etapa->nombre;
    
        return $attributes;
        
    }
}
