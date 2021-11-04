<?php

namespace App\Ahex\Zowner\Domain\Features;

use App\User;

trait HasModifiers
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
