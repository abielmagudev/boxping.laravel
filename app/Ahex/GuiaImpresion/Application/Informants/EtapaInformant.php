<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Etapa;

class EtapaInformant extends Informant
{    
    protected static $title = 'Etapas';

    public static $etapa_cached;

    public static function tags()
    {
        if(! self::hasTags() )
        {
            foreach(Etapa::all() as $etapa)
            {
                self::$tags[$etapa->id] = [
                    'complete' => "Etapa {$etapa->nombre}",
                    'compact' => "Etapa({$etapa->slug})",
                ];
            }
        }

        return self::$tags;
    }
}
