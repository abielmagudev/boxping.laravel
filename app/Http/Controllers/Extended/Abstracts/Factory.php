<?php

namespace App\Http\Controllers\Extended\Abstracts;

abstract class Factory
{
    private static $classpath;
    private static $classname;
    private static $namespace;

    protected static function setProps(array $props)
    {
        self::$classpath = $props['classpath'] ?? null;
        self::$classname = $props['classname'] ?? null;
        self::$namespace = $props['namespace'] ?? null;
    }

    protected static function validate()
    {
        try {
            $name = self::$classname ?? 'Class';

            if( !self::hasValidProps() || !self::existsClassPath() || !self::existsClassName() )
            {
                throw new \Exception( $name . ' not found.');
                return false;
            }

        } catch (Throwable $e) {
            return report($e);
        }

        return true;
    }

    protected static function hasValidProps()
    {
        $props = get_class_vars(__CLASS__);
        
        $valid = array_filter($props, function ($prop) {
            return !empty($prop) && is_string($prop);
        });

        return count($props) === count($valid);
    }

    protected static function existsClassPath()
    {
        return file_exists( self::getClassPath() );
    }

    protected static function existsClassName()
    {
        return class_exists( self::getClassName() );
    }

    protected static function getClassPath()
    {
        return self::$classpath . '/' . self::$classname . '.php';
    }

    protected static function getClassName(bool $namespace = true)
    {
        if( $namespace )
            return self::$namespace . '\\' . self::$classname;
        
        return self::$classname;
    }

    protected static function instantiante(array $params = [])
    {
        self::validate();

        $class = self::getClassName();

        if( count($params) )
            return new $class($params);
        
        return new $class;
    }

    abstract public static function make($name, $params = []);
}
