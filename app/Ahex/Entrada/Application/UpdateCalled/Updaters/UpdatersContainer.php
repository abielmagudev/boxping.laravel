<?php

namespace App\Ahex\Entrada\Application\UpdateCalled\Updaters;

use App\Http\Requests\Entrada\UpdateRequest;

abstract class UpdatersContainer
{
    const UPDATER_NOT_FOUND = false;

    public static $updaters = [
        'confirmado' => ConfirmadoUpdater::class,
        'destinatario' => DestinatarioUpdater::class,
        'importado' => ImportadoUpdater::class,
        'informacion' => InformacionUpdater::class,
        'reempacado' => ReempacadoUpdater::class,
        'remitente' => RemitenteUpdater::class,
    ];

    public static function get(UpdateRequest $request, \App\Entrada $entrada)
    {
        if(! self::exists($request->actualizar) )
            return self::UPDATER_NOT_FOUND;

        $updater_class = self::classname($request->actualizar);
        return new $updater_class($entrada, $request);
    }

    public static function exists($updater_name)
    {
        return isset( self::$updaters[$updater_name] );
    }

    public static function classname($updater_name)
    {
        return self::$updaters[$updater_name];
    }

    public static function names()
    {
        return array_keys( self::$updaters );
    }

    public static function classnames()
    {
        return array_values( self::$updaters );
    }
}
