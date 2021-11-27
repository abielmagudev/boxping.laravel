<?php

namespace App\Ahex\Entrada\Application\UpdateCalled\Updaters;

abstract class Updater
{
    const NOT_MESSAGE = null;

    protected $validated = [];

    protected $messages = [
        'failure' => 'Error al actualizar',
        'success' => 'Actualización con éxito',
    ];
    
    public function __construct(array $validated)
    {
        $this->validated = $validated;
    }

    public function message(string $status): string
    {
        if( ! isset( $this->messages[$status] ) )
            return self::NOT_MESSAGE;

        return $this->messages[$status];
    }

    abstract public function prepared(): array;

    abstract public function route(\App\Entrada $entrada): string;
}
