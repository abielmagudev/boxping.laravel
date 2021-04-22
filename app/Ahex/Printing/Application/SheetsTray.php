<?php 

namespace App\Ahex\Printing\Application;

abstract class SheetsTray
{
    private static $tray = 'printing.sheets.';

    public static function get($name)
    {
        if(! self::exists($name) )
            return abort(404);

        return self::path($name);
    }

    public static function path(string $sheet)
    {
        return self::$tray . $sheet;
    }

    public static function exists(string $sheet)
    {
        return view()->exists( self::path($sheet) );
    }
}
