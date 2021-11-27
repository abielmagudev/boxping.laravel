<?php

namespace App\Ahex\Entrada\Application\UpdateCalled\Updaters;

use App\Entrada;

class InformacionUpdater extends Updater
{
    protected $messages = [
        'failure' => 'Error al actualizar la información',
        'success' => 'Información actualizada',
    ];

    public function prepared(): array
    {
        return Entrada::prepare($this->validated);
    }

    public function route(Entrada $entrada): string
    {
        return route('entradas.edit', [$entrada, 'editor' => 'informacion']);
    }
}
