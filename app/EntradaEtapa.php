<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EntradaEtapa extends Pivot
{
    public $incrementing = true;

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function zona()
    {
        return $this->belongsTo(Zona::class, 'zona_id');
    }
}
