<?php

namespace App\Ahex\GuiaImpresion\Infrastructure\PageDesigner;

use App\Ahex\GuiaImpresion\Application\InformantsMananger;

trait InformationActions
{
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
                    
                    if( $this->guide->hasTipoDescripcion()  )
                    {
                        $description = InformantsMananger::description($informant, $action, $this->guide->tipo_descripcion);
                        $all_information[ $description ] = $information;
                        continue;
                    }
                    
                    array_push($all_information, $information);
                }
            }

            array_push($all_information, '???');
        }

        return $all_information ?? [];
    }
}
