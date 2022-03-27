<?php

namespace App\Ahex\Entrada\Application\UpdateCalled\Updaters;

class ConfirmadoUpdater extends Updater
{
    public function prepare(): array
    {
        return [
            'confirmado_by' => auth()->user()->id,
            'confirmado_at' => now(),
            'updated_by' => auth()->user()->id,
        ];
    }

    public function success(): string
    {
        return 'Confirmación de la entrada actualizada.';
    }
    
    public function failure(): string
    {
        return 'Error al actualizar la confirmación de la entrada.';
    }
}
