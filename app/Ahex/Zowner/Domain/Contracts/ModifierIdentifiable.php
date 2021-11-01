<?php

namespace App\Ahex\Zowner\Domain\Contracts;

interface ModifierIdentifiable
{
    public function creator();

    public function updater();
}
