<?php

namespace App\Ahex\Consolidado\Application;

use App\Entrada;

Trait HandlerTrait
{
    private function updateEntradas($consolidado)
    {
        return Entrada::where('consolidado_id', $consolidado->id)
                      ->update(['cliente_id' => $consolidado->cliente_id]);
    }

    private function uncoupleEntradas($consolidado_id)
    {
        if( request('eliminar_entradas', 'no') === 'no' )
            return $this->unbindEntradas($consolidado_id);

        return $this->deleteEntradas($consolidado_id);
    }

    private function unbindEntradas($consolidado_id)
    {
        return Entrada::where('consolidado_id', $consolidado_id)
                      ->update(['consolidado_id' => null]);
    }

    private function deleteEntradas($consolidado_id)
    {
        return Entrada::where('consolidado_id', $consolidado_id)
                      ->delete();
    }
}
