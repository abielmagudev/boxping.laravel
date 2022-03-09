<?php

namespace App\Ahex\Entrada\Application\UpdateMultipleCalled;

abstract class UpdaterMultiple
{
    public $invalid_message = 'Actualización no válida para la selección de entradas';

    public function __construct($value)
    {
        $this->value = $value;
    }

    abstract public function validate():bool;

    abstract public function values():array;

    abstract public function update(array $entradas_id);
}