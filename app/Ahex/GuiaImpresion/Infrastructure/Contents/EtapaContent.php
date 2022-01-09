<?php

namespace App\Ahex\GuiaImpresion\Infrastructure\Contents;

class EtapaContent extends Content
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
