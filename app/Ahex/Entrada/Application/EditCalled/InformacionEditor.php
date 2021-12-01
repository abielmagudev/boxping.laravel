<?php

namespace App\Ahex\Entrada\Application\EditCalled;

class InformacionEditor extends Editor
{
    public function template(): string
    {
        return 'entradas.edit.informacion';
    }

    public function data(): array
    {        
        return [
            'clientes' => $this->entrada->hasConsolidado() ?: \App\Cliente::all(['id','nombre','alias']),
            'entrada' => $this->entrada,
        ];
    }
}
