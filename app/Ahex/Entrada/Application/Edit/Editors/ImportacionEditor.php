<?php

namespace App\Ahex\Entrada\Application\Edit\Editors;

use App\Conductor;
use App\Vehiculo;

class ImportacionEditor extends Editor
{
    public $template = 'entradas.edit.importacion';

    public function data(): array
    {
        return [
            'conductores' => Conductor::all(),
            'vehiculos' => Vehiculo::all(),
            'entrada' => $this->entrada,
        ];
    }
}
