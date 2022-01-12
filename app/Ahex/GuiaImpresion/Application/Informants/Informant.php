<?php 

namespace App\Ahex\GuiaImpresion\Application\Informants;

abstract class Informant
{   
    protected static $actions_labels = [];
    
    public static function getActionsLabels()
    {
        return static::$actions_labels;
    }
}
