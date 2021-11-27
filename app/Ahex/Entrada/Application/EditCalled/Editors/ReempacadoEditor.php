<?php

namespace App\Ahex\Entrada\Application\EditCalled\Editors;

use App\Codigor;
use App\Reempacador;

class ReempacadoEditor extends Editor
{
    public $template = 'entradas.edit.reempacado';
    
    public function data(): array
    {
        return [
            'codigosr' => Codigor::all(),
            'reempacadores' => Reempacador::all(),
            'entrada' => $this->entrada,
        ];
    }
}
