<?php

namespace App\Ahex\GuiaImpresion\Infrastructure\PageDesigner;

use App\Ahex\GuiaImpresion\Application\InformantsMananger;

trait InformationActions
{
    public static function allInformants()
    {
        if( self::hasCache('informants') )
            return  self::cache('informants');

        return self::setCache('informants', InformantsMananger::all());
    }

    public function allInformation(\App\Entrada $entrada)
    {
        return array_map(function ($informant_action) use ($entrada) {

            if( strpos($informant_action, '.') <> false )
            {
                list($informant, $action) = explode('.', $informant_action);
                
                if( InformantsMananger::exists($informant, $action) )
                    return InformantsMananger::action($informant, $action, $entrada);
            }
            
            return '...?';

        }, $this->guide->informacion_array);
    }
}
