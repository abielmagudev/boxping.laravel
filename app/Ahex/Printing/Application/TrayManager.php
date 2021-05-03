<?php 

namespace App\Ahex\Printing\Application;

abstract class TrayManager
{
    public static $templates_path = 'printing.templates.';

    public static $layouts = [
        'multiple' => 'printing.multiple',
        'single' => 'printing.single',
    ];

    public static function layout($name)
    {
        if(! isset( self::$layouts[$name] ) )
            return abort(404);

        return self::$layouts[$name];
    }

    public static function template($name)
    {
        if(! self::templateExists($name) )
            return abort(404);

        return self::templatePath($name);
    }

    public static function templatePath(string $template)
    {
        return self::$templates_path . $template;
    }

    public static function templateExists(string $template)
    {
        return view()->exists( self::templatePath($template) );
    }
}
