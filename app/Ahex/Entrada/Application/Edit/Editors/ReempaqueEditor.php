<?php

namespace App\Ahex\Entrada\Application\Edit\Editors;

use App\Codigor;
use App\Reempacador;

class ReempaqueEditor extends Editor
{
    public $template = 'entradas.edit.reempaque';
    
    public function data(): array
    {
        return [
            'codigosr' => Codigor::all(),
            'reempacadores' => Reempacador::all(),
            'entrada' => $this->entrada,
        ];
    }
}
