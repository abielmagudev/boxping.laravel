<?php

namespace App\Ahex\Consolidado\Domain;

use App\Entrada;

trait EntradasHandler
{
    public function updateEntradas()
    {
        return Entrada::where('consolidado_id', $this->id)
                        ->update([
                            'cliente_id' => $this->cliente_id
                        ]);
    }

    public function removeEntradas()
    {
        return Entrada::where('consolidado_id', $this->id)
                        ->update([
                            'consolidado_id' => null
                        ]);
    }

    public function deleteEntradas()
    {
        return Entrada::where('consolidado_id', $this->id)
                        ->delete();
    }

    public function unbindEntradas( $delete = false )
    {
        if( ! $delete )
            return $this->removeEntradas();

        return $this->deleteEntradas();
    }
}
