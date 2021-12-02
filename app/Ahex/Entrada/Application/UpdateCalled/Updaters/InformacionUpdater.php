<?php

namespace App\Ahex\Entrada\Application\UpdateCalled\Updaters;

class InformacionUpdater extends Updater
{
    public function prepare(): array
    {
        return \App\Entrada::prepare($this->validated);
    }
    
    public function failure(): string
    {
        return 'Error al actualizar la información de la entrada.';
    }

    public function success(): string
    {
        return 'Información de la entrada actualizada.';
    }
}
