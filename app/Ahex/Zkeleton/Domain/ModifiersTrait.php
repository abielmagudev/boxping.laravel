<?php

namespace App\Ahex\Zkeleton\Domain;

Trait ModifiersTrait
{
    public function creator()
    {
        return $this->belongsTo(\App\User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(\App\User::class, 'updated_by');
    }
}
