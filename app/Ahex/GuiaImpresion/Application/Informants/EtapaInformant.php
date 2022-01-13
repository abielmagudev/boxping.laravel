<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Etapa;

class EtapaInformant extends Informant
{
    public static function getActionsLabels()
    {
        return static::$actions_labels = self::generateActiosLabels();
    }

    public static function generateActiosLabels()
    {    
        foreach(Etapa::all() as $etapa)
        {
            $actions_labels[$etapa->id] = [
                'completa' => $etapa->nombre,
                'compacta' => $etapa->slug,
            ];
        }
    
        return $actions_labels ?? [];
    }
}
