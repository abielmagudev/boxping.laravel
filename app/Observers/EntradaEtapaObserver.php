<?php

namespace App\Observers;

use App\Etapa;
use App\EntradaEtapa;
use App\EntradaActualizacion;

class EntradaEtapaObserver
{
    /**
     * Handle the entrada etapa "created" event.
     *
     * @param  \App\EntradaEtapa  $entradaEtapa
     * @return void
     */
    public function created(EntradaEtapa $entradaEtapa)
    {
        return EntradaActualizacion::create([
            'descripcion' => "agregó etapa {$entradaEtapa->etapa->nombre}",
            'entrada_id' => $entradaEtapa->entrada_id,
            'user_id' => $entradaEtapa->updated_by,
        ]);
    }

    /**
     * Handle the entrada etapa "updated" event.
     *
     * @param  \App\EntradaEtapa  $entradaEtapa
     * @return void
     */
    public function updated(EntradaEtapa $entradaEtapa)
    {
        return EntradaActualizacion::create([
            'descripcion' => "actualizó etapa {$entradaEtapa->etapa->nombre}",
            'entrada_id' => $entradaEtapa->entrada_id,
            'user_id' => $entradaEtapa->updated_by,
        ]);
    }

    /**
     * Handle the entrada etapa "deleted" event.
     *
     * @param  \App\EntradaEtapa  $entradaEtapa
     * @return void
     */
    public function deleted(EntradaEtapa $entradaEtapa)
    {
        return EntradaActualizacion::create([
            'descripcion' => "eliminó etapa {$entradaEtapa->etapa->nombre}",
            'entrada_id' => $entradaEtapa->entrada_id,
            'user_id' => rand(1,9),
        ]);
    }
}
