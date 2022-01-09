<?php 

namespace App\Ahex\GuiaImpresion\Infrastructure\Contents;

abstract class Content
{   
    protected static $actions_labels = [];
    
    public static function getActionsLabels()
    {
        return static::$actions_labels;
    }
}
