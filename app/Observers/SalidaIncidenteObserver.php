<?php

namespace App\Observers;

use App\SalidaIncidente;
use App\ActualizacionSalida;

class SalidaIncidenteObserver
{
    /**
     * Handle the salida incidente "created" event.
     *
     * @param  \App\SalidaIncidente  $salidaIncidente
     * @return void
     */
    public function created(SalidaIncidente $salidaIncidente)
    {
        ActualizacionSalida::create([
            'descripcion' => "agregó incidente {$salidaIncidente->incidente->titulo}",
            'salida_id' => $salidaIncidente->salida_id,
            'user_id' => $salidaIncidente->salida->updated_by,
        ]);
    }

    /**
     * Handle the salida incidente "deleted" event.
     *
     * @param  \App\SalidaIncidente  $salidaIncidente
     * @return void
     */
    public function deleted(SalidaIncidente $salidaIncidente)
    {
        ActualizacionSalida::create([
            'descripcion' => "eliminó incidente {$salidaIncidente->incidente->titulo}",
            'salida_id' => $salidaIncidente->salida_id,
            'user_id' => $salidaIncidente->salida->updated_by,
        ]);
    }
}
