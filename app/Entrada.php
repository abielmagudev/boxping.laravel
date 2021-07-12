<?php

namespace App;

use App\Ahex\Fake\Domain\Fakeuser;
use Illuminate\Database\Eloquent\Model;
use App\Ahex\Entrada\Domain\RelationshipsTrait as Relationships;
use App\Ahex\Entrada\Domain\AttributesTrait as Attributes;
use App\Ahex\Entrada\Domain\ScopesTrait as Scopes;
use App\Ahex\Entrada\Domain\FiltersTrait as Filters;
use App\Ahex\Entrada\Domain\ConditionsTrait as Conditions;
use App\Ahex\Entrada\Domain\UpdatesDescriptionsTrait as UpdatesDescriptions;
use App\Ahex\Zkeleton\Domain\ModifiersTrait as Modifiers;

class Entrada extends Model
{
    use Attributes,
        Conditions,
        Filters,
        Modifiers,
        Relationships,
        Scopes,
        UpdatesDescriptions;
    
    protected $fillable = array(
        // Entrada
        'numero',
        'consolidado_id',
        'cliente_id',
        'cliente_alias_numero',
        'contenido',

        // Trayectoria
        'destinatario_id',
        'remitente_id',

        // Importacion
        'vehiculo_id',
        'conductor_id',
        'numero_cruce',
        'importado_fecha',
        'importado_hora',

        // Reempaque
        'codigor_id',
        'reempacador_id',
        'reempacado_fecha',
        'reempacado_hora',

        // Confirmación
        'confirmado_by',
        'confirmado_at',

        // Log
        'created_by',
        'updated_by',
    );

    public static function prepare($validated)
    {
        $consolidado_number_id = $validated['consolidado_numero'] ?? $validated['consolidado'] ?? 0;
        $consolidado = Consolidado::searchForceToEntrada( $consolidado_number_id );

        $prepared = [
            'numero' => $validated['numero'],
            'consolidado_id' => $consolidado->id ?? null,
            'cliente_id' => $consolidado->cliente_id ?? $validated['cliente'],
            'cliente_alias_numero' => isset($validated['cliente_alias_numero']) ? 1 : 0,
            'contenido' => $validated['contenido'] ?? null,
            'updated_by' => Fakeuser::live(),
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = Fakeuser::live();

        return $prepared;
    }
}
