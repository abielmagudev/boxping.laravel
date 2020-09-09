<?php

namespace App\Ahex\Entrada\Application;

use App\Consolidado;

Trait BelongsConsolidadoTrait
{
    private function consolidado( $has_consolidado_id )
    {
        if( is_numeric($has_consolidado_id) )
            return $this->consolidadoById( $has_consolidado_id );

        return new Consolidado;
    }

    private function consolidadoById($consolidado_id)
    {
        return Consolidado::find($consolidado_id);
    }

    private function consolidadoByNumber($consolidado_numero)
    {
        return Consolidado::where('numero', $consolidado_numero)->first();
    }
}
