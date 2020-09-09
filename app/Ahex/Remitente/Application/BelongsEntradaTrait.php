<?php

namespace App\Ahex\Remitente\Application;

use App\Entrada;

Trait BelongsEntradaTrait
{
    public function comesFromEntrada($remitente_id)
    {
        if( request()->has('entrada') )
        {
            if( ! $this->belongsEntrada($remitente_id) )
                return redirect()->route('entradas.index')->with('failure', 'Entrada y remitente sin relación válida')->send();
        }

        return;
    }

    private function belongsEntrada($remitente_id)
    {
        return Entrada::where('id', request('entrada'))
                      ->where('remitente_id', $remitente_id)
                      ->exists();
    }
}
