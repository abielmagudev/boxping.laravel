<?php

namespace App\Ahex\Entrada\Application\UpdateCalled\Updaters;

use App\Entrada;
use App\Http\Requests\Entrada\UpdateRequest;

abstract class Updater
{
    protected $validated;
    protected $entrada;

    public function __construct(Entrada $entrada, UpdateRequest $request)
    {
        $this->entrada = $entrada;
        $this->validated = $request->validated();
    }

    abstract public function prepare(): array;

    public function failure(): string
    {
        return 'Error al intentar actualizar la entrada.';
    }

    public function success(): string
    {
        return 'Entrada ha sido actualizada.';
    }
}
