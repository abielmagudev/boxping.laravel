<?php

namespace App\Ahex\Remitente\Application;

Trait RelationsTrait
{
    private function validateRelationshipEntrada($entrada_id, $remitente_id)
    {
        if( is_numeric($entrada_id) )
        {
            if( ! $this->existsRelationshipEntrada($entrada_id, $remitente_id) )
                return redirect()->route('entradas.index')->with('failure', 'Entrada y remitente sin relación válida')->send();
        }

        return;
    }

    private function existsRelationshipEntrada($entrada_id, $remitente_id)
    {
        return \App\Entrada::where('id', $entrada_id)
                            ->where('remitente_id', $remitente_id)
                            ->exists();        
    }
}
