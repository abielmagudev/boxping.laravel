<?php

namespace App\Ahex\Consolidado\Domain;

trait Validations
{
    public function hasStatus(string $status): bool
    {
        return $this->status === $status;
    }

    public function hasAbierto(): bool
    {
        return $this->status === 'abierto';
    }

    public function hasCerrado(): bool
    {
        return $this->status === 'cerrado';
    }
}
