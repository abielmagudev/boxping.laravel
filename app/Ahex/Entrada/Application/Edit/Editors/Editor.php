<?php

namespace App\Ahex\Entrada\Application\Edit\Editors;

use App\Entrada;

abstract class Editor
{
    public $entrada;

    public function __construct(Entrada $entrada)
    {
        $this->entrada = $entrada;
    }

    abstract public function template(): string;

    abstract public function data(): array;
}
