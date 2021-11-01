<?php

namespace App\Ahex\Zowner\Domain\Contracts;

interface ValueSearchable
{
    public function scopeSearch($query, $value);
}
