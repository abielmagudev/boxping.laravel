<?php

namespace App\Observers;

use App\Entrada;
use App\EntradaActualizacion;

class EntradaObserver
{
    /**
     * Handle the entrada "updated" event.
     *
     * @param  \App\Entrada  $entrada
     * @return void
     */
    public function updated(Entrada $entrada)
    {
        foreach($entrada->getChanges() as $updated => $value)
        {
            if( ! $entrada->hasUpdateDescription($updated) )
                continue;

            EntradaActualizacion::create([
                'descripcion' => $entrada->getUpdateDescription($updated),
                'entrada_id' => $entrada->id,
                'user_id' => $entrada->updated_by,
            ]);       
        }
    }
}