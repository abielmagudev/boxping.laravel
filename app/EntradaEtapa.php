<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Ahex\EntradaEtapa\Domain\Relations;
use App\Ahex\EntradaEtapa\Domain\Validations;
use App\Ahex\EntradaEtapa\Domain\Attributes;
use App\Ahex\Zowner\Domain\Contracts\ModifierIdentifiable;
use App\Ahex\Zowner\Domain\Features\HasModifiers;

class EntradaEtapa extends Pivot implements ModifierIdentifiable
{
    use HasFactory,
        HasModifiers,
        Attributes,
        Relations,
        Validations;

    public $incrementing = true;
    
    public static function prepare($validated)
    {
        $prepared = [
            'peso'             => $validated['peso'] ?? null,
            'medicion_peso'    => $validated['medicion_peso'] ?? null,
            'largo'            => $validated['largo'] ?? null,
            'ancho'            => $validated['ancho'] ?? null,
            'alto'             => $validated['alto'] ?? null,
            'medicion_volumen' => $validated['medicion_volumen'] ?? null,
            'zona_id'          => $validated['zona'] ?? null,
            'alertas_id'       => isset($validated['alertas']) ? json_encode($validated['alertas']) : null,
            'updated_by'       => auth()->user()->id,
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = $prepared['updated_by'];

        return $prepared;
    }
}
