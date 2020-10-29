<?php

namespace App\Ahex\Destinatario\Application;

Trait RelationsTrait
{
    private function validateRelationshipEntrada($entrada_id, $destinatario_id)
    {
        if( is_numeric($entrada_id) )
        {
            if( ! $this->existsRelationshipEntrada($entrada_id, $destinatario_id) )
                return redirect()->route('entradas.index')->with('failure', 'Entrada y destinatario sin relación válida')->send();
        }

        return;
    }

    private function existsRelationshipEntrada($entrada_id, $destinatario_id)
    {
        return \App\Entrada::where('id', $entrada_id)
                            ->where('destinatario_id', $destinatario_id)
                            ->exists();        
    }
}
