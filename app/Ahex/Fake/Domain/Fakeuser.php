<?php 

namespace App\Ahex\Fake\Domain;

class Fakeuser
{
    private static $live_id;

    public static function live($limit = 10)
    {
        if( is_null( self::$live_id ) )
            self::$live_id = rand(1, $limit);

        return self::$live_id;
    }
}