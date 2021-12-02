<?php

namespace App\Ahex\Entrada\Application\UpdateCalled\Updaters;

class ImportadoUpdater extends Updater
{
    public function prepare(): array
    {
        return [
            'vehiculo_id'     => $this->validated['vehiculo'],
            'conductor_id'    => $this->validated['conductor'],
            'numero_cruce'    => $this->validated['numero_cruce'],
            'importado_fecha' => $this->validated['importado_fecha'],
            'importado_hora'  => $this->validated['importado_hora'],
            'updated_by'      => auth()->user()->id,
        ];
    }

    public function failure(): string
    {
        return 'Error al actualizar el importado de la entrada.';
    }

    public function success(): string
    {
        return 'Importado de la entrada actualizada.';
    }
}
