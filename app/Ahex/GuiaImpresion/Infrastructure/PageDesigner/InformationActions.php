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
        foreach($this->guide->informacion_array as $informant_action)
        {
            if( strpos($informant_action, '.') <> false )
            {
                list($informant, $action) = explode('.', $informant_action);
                
                if( InformantsMananger::exists($informant, $action) )
                {
                    $information = InformantsMananger::action($informant, $action, $entrada);
                    $label = InformantsMananger::label($informant, $action, $this->guide->tipo_etiqueta);

                    if( $this->guide->hasEtiquetas()  )
                    {
                        $all_information[ $label ] = $information;
                        continue;
                    }
                    
                    array_push($all_information, $information);
                }
            }

            array_push($all_information, '...?');
        }

        return $all_information ?? [];
    }

    public function hasFinalInformation()
    {
        return $this->guide->hasTextoFinal();
    }

    public function finalInformation()
    {
        return $this->guide->texto_final;
    }
}
