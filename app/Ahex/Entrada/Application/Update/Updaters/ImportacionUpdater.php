<?php

namespace App\Ahex\Entrada\Application\Update\Updaters;

class ImportacionUpdater extends Updater
{
    protected $messages = [
        'failure' => 'Error al actualizar la importación',
        'success' => 'Importación actualizada',
    ];

    public function prepared(): array
    {
        return [
            'vehiculo_id'     => $this->validated['vehiculo'],
            'conductor_id'    => $this->validated['conductor'],
            'numero_cruce'    => $this->validated['numero_cruce'],
            'importado_fecha' => $this->validated['importado_fecha'],
            'importado_hora'  => $this->validated['importado_hora'],
            'updated_by'      => rand(1,5),
        ];
    }

    public function route(\App\Entrada $entrada): string
    {
        return route('entradas.edit', [$entrada, 'editor' => 'importacion']);
    }
}
