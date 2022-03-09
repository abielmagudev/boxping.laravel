<?php

namespace App\Ahex\Entrada\Application\UpdateMultipleCalled;

abstract class UpdatersMultipleContainer
{
    const UPDATER_NOT_FOUND = false;

    public static $updaters = [
        'cliente' => ClienteUpdater::class,
        'consolidado' => ConsolidadoUpdater::class,
    ];

    public static function get(array $request)
    {
        foreach(self::$updaters as $updater_name => $updater_class)
        {
            if( array_key_exists($updater_name, $request) )
            {
                return new $updater_class( $request[$updater_name] );
                break;
            }
        }

        return self::UPDATER_NOT_FOUND;
    }
}
