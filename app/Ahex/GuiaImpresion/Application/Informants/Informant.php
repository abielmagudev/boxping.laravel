<?php 

namespace App\Ahex\GuiaImpresion\Application\Informants;

abstract class Informant
{   
    public static $description_types = ['completa', 'minima'];

    public static $default_description_type = 'minima';

    protected static $actions_descriptions = [];

    public static function getActionsDescriptions()
    {
        return static::$actions_descriptions;
    }

    public static function getActionDescription(string $action, string $type_description)
    {
        return static::$actions_descriptions[$action][$type_description];
    }
}
