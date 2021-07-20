<?php

namespace App;

use App\Ahex\Fake\Domain\Fakeuser;
use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Ahex\Zkeleton\Domain\ModifiersTrait as Modifiers;

class EntradaEtapa extends Pivot
{
    use Modifiers;

    public $incrementing = true;

    public function zona()
    {
        return $this->belongsTo(Zona::class, 'zona_id');
    }

    public function scopeAlertas()
    {
        if( is_null($this->alertas_id) )
            return collect([]);

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
