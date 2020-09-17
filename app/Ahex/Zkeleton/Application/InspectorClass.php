<?php

namespace App\Ahex\Zkeleton\Application;

Abstract class InspectorClass
{
    public static function validate($filepath, $classname)
    {
        try {

            self::notExistsFile($filepath);
            self::notFoundClassname($classname);

        } catch (Throwable $e) {

            return report($e);

        }
    }

    private static function notExistsFile($filepath)
    {
        if( ! file_exists($filepath) )
            throw new \Exception('File\'class not exists.');
    }

    private static function notFoundClassname($classname)
    {
        if( ! class_exists($classname) )
            throw new \Exception('Class not found. [' . $classname . ']');
    }
}
