<?php

namespace App\Ahex\Entrada\Application\UpdateCalled\Validators;

abstract class ValidatorsContainer
{
    const VALIDATOR_NOT_FOUND = null;

    private static $validators = [
        'confirmado' => ConfirmadoValidator::class,
        'destinatario' => DestinatarioValidator::class,
        'importado' => ImportadoValidator::class,
        'informacion' => InformacionValidator::class,
        'reempacado' => ReempacadoValidator::class,
        'remitente' => RemitenteValidator::class,
    ];

    public static function get(string $validator_name, \App\Entrada $entrada)
    {
        if(! self::exists($validator_name) )
            return self::VALIDATOR_NOT_FOUND;

        $validator_class = self::classname($validator_name);
        return new $validator_class($entrada);
    }

    public static function exists(string $validator_name)
    {
        return isset( self::$validators[$validator_name] );
    } 

    public static function classname(string $validator_name)
    {
        return self::$validators[$validator_name];
    }

    public static function names()
    {
        return array_keys( self::$validators );
    }

    public static function classnames()
    {
        return array_values( self::$validators );
    }
}
