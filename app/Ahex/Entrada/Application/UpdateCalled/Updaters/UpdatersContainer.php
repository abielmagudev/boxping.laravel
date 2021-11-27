<?php

namespace App\Ahex\Entrada\Application\UpdateCalled\Updaters;

abstract class UpdatersContainer
{
    public static $updaters = [
        'confirmacion' => ConfirmacionUpdater::class,
        'destinatario' => DestinatarioUpdater::class,
        'importacion' => ImportacionUpdater::class,
        'informacion' => InformacionUpdater::class,
        'reempaque' => ReempaqueUpdater::class,
        'remitente' => RemitenteUpdater::class,
    ];

    public static function names()
    {
        return array_keys(self::$updaters);
    }

    public static function find($name, $validated)
    {
        return new self::$updaters[$name] ($validated);
    }
}
