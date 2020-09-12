<?php

namespace App\Ahex\Consolidado\Domain;

use App\Entrada;
use App\Ahex\Fake\Domain\Fakeuser;

Abstract class Updater
{
    public static function save( object $validated, $consolidado )
    {
        $filled = self::fill( $validated );
        
        if( $response = $consolidado->fill( $filled )->save() )
        {
            Entrada::where('consolidado_id', $consolidado->id)
                    ->update([
                        'cliente_id' => $consolidado->cliente_id
                    ]);
        }
        
        return $response;
    }
    
    private static function fill( $validated )
    {
        return [
            'numero'     => $validated->numero,
            'tarimas'    => $validated->tarimas,
            'notas'      => $validated->notas,
            'cerrado'    => isset($validated->cerrado) ? 1 : 0,
            'cliente_id' => $validated->cliente,
            'updated_by_user' => Fakeuser::live(),
        ];
    }
}
