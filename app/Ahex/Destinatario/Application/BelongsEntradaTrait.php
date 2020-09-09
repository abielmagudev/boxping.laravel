<?php

namespace App\Ahex\Destinatario\Application;

use App\Entrada;

Trait BelongsEntradaTrait
{
    private function comesFromEntrada($destinatario_id)
    {
        if( request()->has('entrada') )
        {
            if( ! $this->belongsEntrada($destinatario_id) )
            {
                return redirect()->route('entradas.index')->with('failure', 'Entrada y destinatario sin relación válida')->send();
            }
        }

        return;
    }

    private function belongsEntrada($destinatario_id)
    {
        return Entrada::where('id', request('entrada'))
                      ->where('destinatario_id', $destinatario_id)
                      ->exists();
    }
}
