<?php

namespace App\Ahex\Entrada\Application\EditCalled;

class ImportadoEditor extends Editor
{
    public function template(): string
    {
        return 'entradas.edit.importado';
    }

    public function data(): array
    {
        return [
            'conductores' => \App\Conductor::all(),
            'vehiculos' => \App\Vehiculo::all(),
            'entrada' => $this->entrada,
        ];
    }
}
