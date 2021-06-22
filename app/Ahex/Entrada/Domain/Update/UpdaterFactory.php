<?php

namespace App\Ahex\Entrada\Domain\Update;

use App\Http\Requests\EntradaUpdateRequest as UpdateRequest;
use App\Entrada;

abstract class UpdaterFactory
{
    public static function get(UpdateRequest $request, Entrada $entrada)
    {
        $classname = self::classname($request->actualizar);
        return new $classname($request, $entrada);
    }

    public static function classname($name)
    {
        return __NAMESPACE__ . '\\' . ucfirst($name) . 'Updater';
    }

    public static function exists($name)
    {
        return class_exists( self::classname($name) );
    }
}
