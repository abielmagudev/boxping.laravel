<?php

namespace App\Ahex\Entrada\Application\EditCalled\Editors;

use App\Entrada;

abstract class EditorsContainer
{
    private static $editors = [
        'destinatario' => DestinatarioEditor::class,
        'importado' => ImportadoEditor::class,
        'informacion' => InformacionEditor::class,
        'reempacado' => ReempacadoEditor::class,
        'remitente' => RemitenteEditor::class,
    ];

    public static function get(string $name, Entrada $entrada)
    {
        return new self::$editors[$name] ($entrada);
    }

    public static function exists($name)
    {
        return isset( self::$editors[$name] );
    }
    
    public static function classes()
    {
        return array_values( self::$editors );
    }

    public static function names()
    {
        return array_keys( self::$editors );
    }
}
