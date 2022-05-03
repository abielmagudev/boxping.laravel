<?php

namespace App\Observers;

use App\Salida;
use App\ActualizacionSalida;

class SalidaObserver
{
    /**
     * Handle the salida "updated" event.
     *
     * @param  \App\Salida  $salida
     * @return void
     */
    public function updated(Salida $salida)
    {
        foreach($salida->getChanges() as $updated => $value)
        {
            if( ! $salida->hasUpdateDescription($updated) )
                continue;

            ActualizacionSalida::create([
                'descripcion' => $salida->getUpdateDescription($updated),
                'salida_id' => $salida->id,
                'user_id' => $salida->updated_by,
            ]);   
        }
    }

    /**
     * Handle the salida "deleted" event.
     *
     * @param  \App\Salida  $salida
     * @return void
     */
    public function deleted(Salida $salida)
    {
        //
    }

    /**
     * Handle the salida "force deleted" event.
     *
     * @param  \App\Salida  $salida
     * @return void
     */
    public function forceDeleted(Salida $salida)
    {
        //
    }
}
