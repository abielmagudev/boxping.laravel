<?php

namespace App\Ahex\Zkeleton\Application;

use Exception;

Abstract class Instantiator
{
    public static function build($classname, $arguments = false)
    {
        self::verify($classname);

        if(! self::hasArguments($arguments) )
            return new $classname;
        
        return new $classname(...$arguments);
    }

    private static function verify($classname)
    {
        if(! class_exists($classname, true) )
            throw new Exception("Classname {$classname} not found");
    }

    private static function hasArguments($arguments)
    {
        return is_array($arguments) && count($arguments);
    }
}
