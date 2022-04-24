<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Etapa;

class EtapaInformant extends Informant
{    
    public static $etapa_cached;

    public static function tags()
    {
        foreach(Etapa::all() as $etapa)
        {
            $tags[$etapa->id] = [
                'complete' => "Etapa {$etapa->nombre}",
                'compact' => "Etapa({$etapa->slug})",
            ];
        }

        return $tags;
    }
}
