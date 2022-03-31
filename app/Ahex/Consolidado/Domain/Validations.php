<?php

namespace App\Ahex\Consolidado\Domain;

trait Validations
{
    public function isReal()
    {
        return ! is_null($this->id);
    }
    
    public function isAbierto(): bool
    {
        return $this->status === 'abierto';
    }

    public function isCerrado(): bool
    {
        return $this->status === 'cerrado';
    }

    public function hasStatus(string $status): bool
    {
        return $this->status === $status;
    }
    
    public function hasEntradas(): bool
    {
        return $this->entradas->count() > 0;
    }
}
