<?php 

namespace App\Ahex\Entrada\Domain;

use App\Ahex\Zkeleton\Application\InspectorClass;
use App\Ahex\Zkeleton\Application\InstantiatorClass;

Abstract class UpdaterFactory
{
    private static $classname;
    private static $filepath;
    private static $namespace_classname;

    public static function make($name, $parameters)
    {
        self::setup($name);
        return InstantiatorClass::build(self::$namespace_classname, $parameters);
    }

    private static function setup($name)
    {
        self::$classname = ucfirst( strtolower($name) ) . 'Updater';
        self::$filepath = app_path('Ahex/Entrada/Domain/Updaters/' . self::$classname . '.php');
        self::$namespace_classname = __NAMESPACE__ . '\Updaters\\' . self::$classname;
        
        InspectorClass::validate(self::$filepath, self::$namespace_classname);
    }
}
