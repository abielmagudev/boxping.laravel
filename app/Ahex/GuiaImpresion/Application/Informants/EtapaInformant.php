<?php

namespace App\Ahex\GuiaImpresion\Application\Informants;

use App\Etapa;

class EtapaInformant extends Informant
{    
    protected static $title = 'Etapas';

    protected static $etapas_cache = [];

    public static function __callStatic($etapa_id, $arguments = null)
    {
        if(! self::hasEtapa($etapa_id) )
            self::setEtapa($etapa_id);

        return self::etapa($etapa_id)->nombre ?? '...etapa?';
    }

    public static function hasEtapa(string $id)
    {
        return array_key_exists($id, self::$etapas_cache);
    }
    
    public static function setEtapa(string $id)
    {
        return self::$etapas_cache[$id] = Etapa::find($id) ?? new Etapa;
    }

    public static function etapa(string $id)
    {
        return self::$etapas_cache[$id];
    }

    public static function etapas()
    {
        return self::$etapas_cache;
    }

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
