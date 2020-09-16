<?php

namespace App\Ahex\Entrada\Domain;

use App\Ahex\Fake\Domain\Fakeuser;
use App\Entrada;
use App\Consolidado;

Abstract class Storer
{
    public static function save( object $validated )
    {
        $filled = self::filling($validated);
        return Entrada::create($filled);
    }

    private static function filling( $validated )
    {
        if( ! isset($validated->consolidado) )
            return self::fillWithoutConsolidado($validated);

        $consolidado = Consolidado::find($validated->consolidado);
        return self::fillWithConsolidado($validated, $consolidado);
    }

    private static function fillWithoutConsolidado( $validated )
    {
        return [
            'numero' => $validated->numero,
            'cliente_id' => $validated->cliente,
            'cliente_alias_numero' => isset( $validated->cliente_alias_numero ) ? 1 : 0,
            'created_by_user' => Fakeuser::live(),
            'updated_by_user' => Fakeuser::live(),
        ];
    }

    private static function fillWithConsolidado( $validated, $consolidado )
    {
        return [
            'numero' => $validated->numero,
            'consolidado_id' => $consolidado->id,
            'cliente_id' => $consolidado->cliente_id,
            'cliente_alias_numero' => isset( $validated->cliente_alias_numero ) ? 1 : 0,
            'created_by_user' => Fakeuser::live(),
            'updated_by_user' => Fakeuser::live(),
        ];
    }
}
