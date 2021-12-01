<?php

namespace App\Ahex\Entrada\Application\EditCalled;

use App\Codigor;
use App\Reempacador;

class ReempacadoEditor extends Editor
{    
    public function template(): string
    {
        return 'entradas.edit.reempacado';
    }

    public function data(): array
    {
        return [
            'codigosr' => Codigor::all(),
            'reempacadores' => Reempacador::all(),
            'entrada' => $this->entrada,
        ];
    }
}
