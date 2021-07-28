<?php

namespace App\Ahex\Consolidado\Domain;

use App\Entrada;

trait EntradasHandler
{
    public function updateEntradas()
    {
        return Entrada::where('consolidado_id', $this->id)->update(['cliente_id' => $this->cliente_id]);
    }

    public function unbindEntradas()
    {
        return Entrada::where('consolidado_id', $this->id)->update(['consolidado_id' => null]);
    }

    public function deleteEntradas()
    {
        return Entrada::where('consolidado_id', $this->id)->delete();
    }

    public function uncoupleEntradas( $delete_entradas = false )
    {
        if( ! $delete_entradas )
            return $this->unbindEntradas();

        return $this->deleteEntradas();
    }
}
