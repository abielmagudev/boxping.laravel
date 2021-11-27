<?php

namespace App\Ahex\Entrada\Application\EditCalled\Editors;

use App\Conductor;
use App\Vehiculo;

class ImportadoEditor extends Editor
{
    public $template = 'entradas.edit.importado';

    public function data(): array
    {
        return [
            'conductores' => Conductor::all(),
            'vehiculos' => Vehiculo::all(),
            'entrada' => $this->entrada,
        ];
    }
}
