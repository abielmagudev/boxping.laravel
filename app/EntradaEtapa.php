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
        Relations,
        Validations,
        Attributes;

    const MEDICION_SIN_NOMBRE = null;

    public $incrementing = true;

    public $todas_mediciones_peso,
           $todas_mediciones_volumen;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->todas_mediciones_peso = config('system.mediciones.peso');
        $this->todas_mediciones_volumen = config('system.mediciones.longitud');
    }
    
    public static function prepare($validated)
    {
        $prepared = [
            'peso'             => $validated['peso'] ?? null,
            'medicion_peso'    => $validated['medicion_peso'] ?? null,
            'ancho'            => $validated['ancho'] ?? null,
            'altura'           => $validated['altura'] ?? null,
            'largo'            => $validated['largo'] ?? null,
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
