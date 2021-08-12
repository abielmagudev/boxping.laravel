<?php

namespace App\Ahex\Entrada\Application\Update\Updaters;

use App\Entrada;
use App\Http\Requests\EntradaUpdateRequest as UpdateRequest;

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
