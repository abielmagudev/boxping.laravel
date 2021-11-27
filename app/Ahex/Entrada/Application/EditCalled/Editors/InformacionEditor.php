<?php

namespace App\Ahex\Entrada\Application\EditCalled\Editors;

use App\Cliente;
use App\Consolidado;

class InformacionEditor extends Editor
{
    public $template = 'entradas.edit.informacion';

    public function data(): array
    {
        return [
            'clientes' => Cliente::all(['id','nombre','alias']),
            'consolidado' => $this->entrada->consolidado,
            'entrada' => $this->entrada,
        ];
    }
}
