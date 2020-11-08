<?php

namespace App\Ahex\Entrada\Domain;

use App\Ahex\Zkeleton\Application\Instantiator;

Abstract class UpdaterFactory
{
    const NAMESPACE_UPDATERS = __NAMESPACE__ . '\Updaters\\';

    public static function make(string $name, $entrada)
    {
        $classname = self::classname($name);          
        return Instantiator::build($classname, [$entrada]);
    }

    public static function classname($name)
    {
        $capitalized = ucfirst( strtolower($name) );
        return self::NAMESPACE_UPDATERS . $capitalized . 'Updater';
    }

    public static function names()
    {
        return [
            'entrada',
            'reempaque',
            'cruce',
            'destinatario',
            'remitente',
            'verificacion',
        ];
    }
}
