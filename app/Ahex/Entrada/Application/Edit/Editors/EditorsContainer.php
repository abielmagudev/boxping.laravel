<?php

namespace App\Ahex\Entrada\Application\Edit\Editors;

use App\Entrada;

class EditorsContainer
{
    private static $editors = [
        'destinatario' => DestinatarioEditor::class,
        'importacion' => ImportacionEditor::class,
        'informacion' => InformacionEditor::class,
        'reempaque' => ReempaqueEditor::class,
        'remitente' => RemitenteEditor::class,
    ];

    public static function get(string $name, Entrada $entrada)
    {
        if( ! self::exists($name) )
            return back()->with('failure', 'Editor para la entrada no existe.');

        return self::editor($name, $entrada);
    }

    public static function editor($name, $entrada)
    {
        $editor = self::$editors[$name];
        return new $editor($entrada);
    }

    public static function exists($name)
    {
        return isset( self::$editors[$name] );
    }
    
    public static function classes()
    {
        return array_values(self::$editors);
    }

    public static function names()
    {
        return array_keys(self::$editors);
    }
}
