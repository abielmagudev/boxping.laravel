<?php 

namespace App\Ahex\Zkeleton\Application;

Abstract class Slugger
{
    public static function do(string $string, bool $lower = true): string
    {
        $result = self::processing($string);

        if( $lower ) 
            return strtolower( $result );

        return $result;
    }

    private static function processing($string)
    {
        foreach(self::methods() as $method)
        {
            $values = call_user_func([__CLASS__, $method]);
            $string = str_replace($values['search'], $values['replace'], $string);
        }

        return $string;
    }

    private static function methods()
    {
        $methods = get_class_methods( __CLASS__ );
        return array_slice($methods, 3);
    }

    public static function accentless()
    {
        return array(
            'search' => ['á','é','í','ó','ú'],
            'replace' => ['a','e','i','o','u'],
        );
    }

    public static function specialess()
    {
        return array(
            'search' => ['ñ'],
            'replace' => ['n'],
        );
    }

    public static function symboless()
    {
        return array(
            'search' => ['/','\\', '"', '\'', '-', '_', '~', '`', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '+', '=', '{', '}', '[', ']', ':'. ';', ',', '.', '<', '>', '?'],
            'replace' => '',
        );
    }

    public static function kebab()
    {
        return array(
            'search' => ' ',
            'replace' => '-',
        );
    }
}
