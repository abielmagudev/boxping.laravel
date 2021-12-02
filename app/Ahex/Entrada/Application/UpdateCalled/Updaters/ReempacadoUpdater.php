<?php

namespace App\Ahex\Entrada\Application\UpdateCalled\Updaters;

class ReempacadoUpdater extends Updater
{
    public function prepare(): array
    {
        return [
            'codigor_id' => $this->validated['codigo_reempacado'],
            'reempacado_fecha' => $this->validated['reempacado_fecha'],
            'reempacado_hora' => $this->validated['reempacado_hora'],
            'reempacador_id' => $this->validated['reempacador'],
            'updated_by' => auth()->user()->id,
        ];
    }

    public function failure(): string
    {
        return 'Error al actualizar el reempacado de la entrada.';
    }

    public function success(): string
    {
        return 'Reempacado de la entrada actualizada.';
    }
}
