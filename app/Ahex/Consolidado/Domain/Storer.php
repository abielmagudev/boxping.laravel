<?php

namespace App\Ahex\Consolidado\Domain;

use App\Consolidado;
use App\Ahex\Fake\Domain\Fakeuser;

Abstract class Storer
{
    public static function save( object $validated )
    {
        $filled = self::fill( $validated );
        return Consolidado::create( $filled );
    }
    
    private static function fill( $validated )
    {
        return [
            'numero'     => $validated->numero,
            'tarimas'    => $validated->tarimas,
            'notas'      => $validated->notas,
            'cliente_id' => $validated->cliente,
            'created_by_user' => Fakeuser::live(),
            'updated_by_user' => Fakeuser::live(),
        ];
    }
}
