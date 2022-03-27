<?php

namespace App\Ahex\Entrada\Application\EditCalled;

use Illuminate\Http\Request;
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
    
    public static function get(Entrada $entrada, Request $request)
    {
        $editor_class = self::editor( $request->editor );
        return new $editor_class($entrada, $request);
    }

    public static function editor(string $name)
    {
        return self::$editors[ $name ];
    }

    public static function classes(string $glue = null)
    {
        return is_null($glue) 
                ? array_values( self::$editors ) 
                : implode($glue, array_values(self::$editors));
    }

    public static function names(string $glue = null)
    {
        return is_null($glue) 
                ? array_keys( self::$editors ) 
                : implode($glue, array_keys(self::$editors));
    }
}
