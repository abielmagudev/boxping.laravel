<?php

namespace App\Ahex\Entrada\Application\UpdateCalled\Validators;

use App\Entrada;

abstract class ValidatorsContainer
{
    const VALIDATOR_NOT_EXISTS = false;

    public static $validators = [
        'confirmacion' => ConfirmacionValidator::class,
        'destinatario' => DestinatarioValidator::class,
        'importacion' => ImportacionValidator::class,
        'informacion' => InformacionValidator::class,
        'reempaque' => ReempaqueValidator::class,
        'remitente' => RemitenteValidator::class,
    ];

    public static function get($name, Entrada $entrada)
    {
        if( ! self::exists($name) )
            return self::VALIDATOR_NOT_EXISTS;

        return new self::$validators[$name] ($entrada);
    }

    public static function exists($name)
    {
        return isset( self::$validators[$name] );
    }
}
