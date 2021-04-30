<?php 

namespace App\Ahex\Printing\Application;

abstract class TemplatesTray
{
    private static $tray = 'printing.templates.';

    public static function get($name)
    {
        if(! self::exists($name) )
            return abort(404);

        return self::path($name);
    }

    public static function path(string $template)
    {
        return self::$tray . $template;
    }

    public static function exists(string $template)
    {
        return view()->exists( self::path($template) );
    }
}
