<?php

namespace App\Observers;

use App\Entrada;
use App\EntradaActualizaciones;

class EntradaObserver
{
    /**
     * Handle the entrada "created" event.
     *
     * @param  \App\Entrada  $entrada
     * @return void
     */
    public function created(Entrada $entrada)
    {
        //
    }

    /**
     * Handle the entrada "updated" event.
     *
     * @param  \App\Entrada  $entrada
     * @return void
     */
    public function updated(Entrada $entrada)
    {
        foreach($entrada->getChanges() as $prop => $value)
        {
            if( EntradaActualizaciones::hasChangeDescription($prop) )
            {
                $description = EntradaActualizaciones::changeDescription($prop, $entrada);

                EntradaActualizaciones::create([
                    'descripcion' => $description,
                    'entrada_id' => $entrada->id,
                    'user_id' => $entrada->updated_by,
                ]);
            }
        }

        return true;
    }

    /**
     * Handle the entrada "deleted" event.
     *
     * @param  \App\Entrada  $entrada
     * @return void
     */
    public function deleted(Entrada $entrada)
    {
        //
    }

    /**
     * Handle the entrada "restored" event.
     *
     * @param  \App\Entrada  $entrada
     * @return void
     */
    public function restored(Entrada $entrada)
    {
        //
    }

    /**
     * Handle the entrada "force deleted" event.
     *
     * @param  \App\Entrada  $entrada
     * @return void
     */
    public function forceDeleted(Entrada $entrada)
    {
        //
    }
}
