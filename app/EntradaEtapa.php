<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Ahex\Fake\Domain\Fakeuser;

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

    public static function prepare($validated)
    {
        $prepared = [
            'peso'           => $validated['peso'] ?? null,
            'medida_peso'    => $validated['medida_peso'] ?? null,
            'ancho'          => $validated['ancho'] ?? null,
            'altura'         => $validated['altura'] ?? null,
            'largo'          => $validated['largo'] ?? null,
            'medida_volumen' => $validated['medida_volumen'] ?? null,
            'zona_id'        => $validated['zona'] ?? null,
            'alertas_id'     => isset($validated['alertas']) ? json_encode($validated['alertas']) : null,
            'updated_by'     => Fakeuser::live(),
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = Fakeuser::live();

        return $prepared;
    }
}
