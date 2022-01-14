<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Etapa;

class EtapaInformant extends Informant
{
    public static function getActionsDescriptions()
    {
        return static::$actions_descriptions = self::generateActiosDescriptions();
    }

    public static function generateActiosDescriptions()
    {    
        foreach(Etapa::all() as $etapa)
        {
            $actions_descriptions[$etapa->id] = [
                'completa' => "Etapa {$etapa->nombre}",
                'minima' => "Etapa({$etapa->slug})",
            ];
        }
    
        return $actions_descriptions ?? [];
    }
}
