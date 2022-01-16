<?php

namespace App;

use App\Ahex\Salida\Domain\Attributes;
use App\Ahex\Salida\Domain\Relationships;
use App\Ahex\Salida\Domain\Scopes;
use App\Ahex\Salida\Domain\UpdatesDescriptionsTrait as UpdatesDescriptions;
use App\Ahex\Salida\Domain\Validations;
use App\Ahex\Zowner\Domain\Contracts\ModifierIdentifiable;
use App\Ahex\Zowner\Domain\Features\HasModifiers;
use App\Ahex\Zowner\Domain\Features\UpdateDescriptionHandler;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model implements ModifierIdentifiable
{
    use Attributes, 
        Relationships, 
        Scopes, 
        Validations,
        HasModifiers,
        UpdateDescriptionHandler, 
        UpdatesDescriptions;
    
    protected $fillable = [
        'rastreo',
        'confirmacion',
        'cobertura',
        'direccion',
        'postal',
        'ciudad',
        'estado',
        'pais',
        'notas',
        'status',
        'transportadora_id',
        'entrada_id',
        'created_by',
        'updated_by',
    ];

    public static function prepare($validated)
    {
        $prepared = [
            'rastreo'      => $validated['rastreo'] ?? null,
            'confirmacion' => $validated['confirmacion'] ?? null,
            'cobertura'    => $validated['cobertura'],
            'direccion'    => !isset($validated['direccion']) ?: capitalize($validated['direccion']),
            'postal'       => $validated['postal'] ?? null,
            'ciudad'       => !isset($validated['ciudad']) ?: capitalize($validated['ciudad']),
            'estado'       => !isset($validated['estado']) ?: capitalize($validated['estado']),
            'pais'         => $validated['pais'] ?? null,
            'notas'        => $validated['notas'] ?? null,
            'status'       => $validated['status'] ?? static::defaultStatus(),
            'transportadora_id' => $validated['transportadora'] ?? null,
            'updated_by'   => auth()->user()->id,
        ];

        if( request()->isMethod('post') )
        {
            $prepared = array_merge($prepared, [
                'entrada_id' => $validated['entrada'],
                'created_by' => $prepared['updated_by'],
            ]);
        }

        return $prepared;
    }
}
