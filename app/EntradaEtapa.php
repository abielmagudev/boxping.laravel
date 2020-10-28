<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EntradaEtapa extends Pivot
{
    public function zona()
    {
        return $this->belongsTo(Zona::class, 'zona_id');
    }
    
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function scopeAlertas()
    {
        if( ! $this->alertas_id )
            return;

        return Alerta::whereIn('id', json_decode($this->alertas_id))->get();
    }
}
