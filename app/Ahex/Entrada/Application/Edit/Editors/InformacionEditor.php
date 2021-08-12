<?php

namespace App\Ahex\Entrada\Application\Edit\Editors;

use App\Cliente;
use App\Consolidado;

class InformacionEditor extends Editor
{
    public function template(): string
    {
        return 'entradas.edit.informacion';
    }

    public function data(): array
    {
        return [
            'clientes' => Cliente::all(['id','nombre','alias']),
            'consolidado' => $this->entrada->consolidado,
            'entrada' => $this->entrada,
        ];
    }
}
