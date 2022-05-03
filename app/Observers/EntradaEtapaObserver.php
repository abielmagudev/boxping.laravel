<?php

namespace App\Observers;

use App\Etapa;
use App\EntradaEtapa;
use App\ActualizacionEntrada;

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
        return ActualizacionEntrada::create([
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
        return ActualizacionEntrada::create([
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
        return ActualizacionEntrada::create([
            'descripcion' => "eliminó etapa {$entradaEtapa->etapa->nombre}",
            'entrada_id' => $entradaEtapa->entrada_id,
            'user_id' => rand(1,9),
        ]);
    }
}
