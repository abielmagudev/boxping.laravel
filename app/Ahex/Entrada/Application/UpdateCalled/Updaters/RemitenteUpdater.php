<?php

namespace App\Ahex\Entrada\Application\UpdateCalled\Updaters;

class RemitenteUpdater extends Updater
{
    public function prepare(): array
    {
        return [
            'remitente_id' => $this->validated['remitente'],
            'updated_by' => auth()->user()->id,
        ];
    }

    public function failure(): string
    {
        return 'Error al actualiza el remitente de la entrada.';
    }

    public function success(): string
    {
        return 'Remitente de la entrada actualizado.';
    }
}
