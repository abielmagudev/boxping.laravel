<?php

namespace App\Ahex\Zkeleton\Application;

Abstract class InstantiatorClass
{
    public static function build($classname, $arguments = false)
    {
        if( self::hasArguments($arguments) )
            return new $classname(...$arguments);

        return new $classname;
    }

    private static function hasArguments($arguments)
    {
        return is_array($arguments) && count($arguments);
    }
}
