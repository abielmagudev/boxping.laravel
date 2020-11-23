<?php

namespace App\Ahex\Zkeleton\Domain;

use App\User;

Trait ModifiersTrait
{
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
