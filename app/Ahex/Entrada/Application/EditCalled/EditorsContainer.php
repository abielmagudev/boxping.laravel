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

    public static function editor(Request $request, Entrada $entrada)
    {
        $editor_class = self::get( $request->editor );
        return new $editor_class($entrada, $request);
    }
    
    public static function get($editor_name)
    {
        return self::$editors[ $editor_name ];
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
