<?php

namespace App\Ahex\Entrada\Application\UpdateCalled\Updaters;

class DestinatarioUpdater extends Updater
{
    public function prepare(): array
    {
        return [
            'destinatario_id' => $this->validated['destinatario'],
            'confirmado_by' => null,
            'confirmado_at' => null,
            'updated_by' => auth()->user()->id,
        ];
    }

    public function failure(): string
    {
        return 'Error al actualizar el destinatario de la entrada.';
    }

    public function success(): string
    {
        return 'Destinatario de la entrada actualizada.';
    }
}
