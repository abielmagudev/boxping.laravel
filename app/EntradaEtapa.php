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

    public function scopeNulo()
    {
        return (object) [
            'entrada_id' => null,
            'etapa_id' => null,
            'pivot' => (object) [
                'peso' => null,
                'peso_en' => null,
                'ancho' => null,
                'altura' => null,
                'largo' => null,
                'dimensiones_en' => null,
                'created_by_user' => null,
                'updated_by_user' => null,
            ],
        ];
    }
}
