<?php

namespace App\Ahex\Consolidado\Domain;

use App\Entrada;
use App\Ahex\Fake\Domain\Fakeuser;

Abstract class Updater
{
    public static function save( object $validated, $consolidado )
    {
        $data = self::fill( $validated );
        
        if( $response = $consolidado->fill($data)->save() )
            self::updateHisEntradas($consolidado);

        return $response;
    }
    
    private static function fill( $validated )
    {
        return [
            'numero'     => $validated->numero,
            'tarimas'    => $validated->tarimas,
            'notas'      => $validated->notas,
            'abierto'    => isset($validated->cerrado) ? 0 : 1,
            'cliente_id' => $validated->cliente,
            'updated_by_user' => Fakeuser::live(),
        ];
    }

    private static function updateHisEntradas( $consolidado )
    {
        return Entrada::where('consolidado_id', $consolidado->id)->update(['cliente_id' => $consolidado->cliente_id]);
    }
}
