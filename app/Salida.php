<?php

namespace App;

use App\Ahex\Fake\Domain\Fakeuser;
use App\Ahex\Salida\Domain\AttributesTrait as Attributes;
use App\Ahex\Salida\Domain\RelationshipsTrait as Relationships;
use App\Ahex\Salida\Domain\ScopesTrait as Scopes;
use App\Ahex\Salida\Domain\UpdatesDescriptionsTrait as UpdatesDescriptions;
use App\Ahex\Zkeleton\Domain\ModifiersTrait as Modifiers;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use Attributes, Relationships, Scopes, UpdatesDescriptions, Modifiers;
    
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
            'direccion'    => isset($validated['direccion']) ? capitalize($validated['direccion']) : null,
            'postal'       => $validated['postal'] ?? null,
            'ciudad'       => isset($validated['ciudad']) ? capitalize($validated['ciudad']) : null,
            'estado'       => isset($validated['estado']) ? capitalize($validated['estado']) : null,
            'pais'         => $validated['pais'] ?? null,
            'notas'        => $validated['notas'] ?? null,
            'status'       => $validated['status'] ?? array_key_first( config('system.salidas.status') ),
            'transportadora_id' => $validated['transportadora'] ?? null,
            'updated_by'   => Fakeuser::live(),
        ];

        if( request()->isMethod('post') )
        {
            $prepared = array_merge($prepared, [
                'entrada_id' => $validated['entrada'],
                'created_by' => Fakeuser::live(),
            ]);
        }

        return $prepared;
    }
}
