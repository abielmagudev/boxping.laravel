<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Ahex\Entrada\Domain\RelationshipsTrait as Relationships;
use App\Ahex\Entrada\Domain\AttributesTrait as Attributes;
use App\Ahex\Entrada\Domain\ScopesTrait as Scopes;
use App\Ahex\Entrada\Domain\FiltersTrait as Filters;
use App\Ahex\Entrada\Domain\ConditionsTrait as Conditions;
use App\Ahex\Entrada\Domain\UpdatesDescriptionsTrait as UpdatesDescriptions;
use App\Ahex\Zkeleton\Domain\UpdateDescriptionCallableTrait as UpdateDescriptionCallable;
use App\Ahex\Zkeleton\Domain\ModifiersTrait as Modifiers;
use App\Ahex\GuiaImpresion\Application\ModelAttributesPrintableInterface as ModelAttributesPrintable;

class Entrada extends Model implements ModelAttributesPrintable
{
    use HasFactory,
        Attributes,
        Conditions,
        Filters,
        Modifiers,
        Relationships,
        Scopes,
        UpdatesDescriptions,
        UpdateDescriptionCallable;
    
    protected $fillable = array(
        // Entrada
        'numero',
        'consolidado_id',
        'cliente_id',
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
            'contenido' => $validated['contenido'] ?? null,
            'updated_by' => mt_rand(1,10),
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = $prepared['updated_by'];

        return $prepared;
    }

    public static function attributesToPrint(): array
    {
        return [
            'numero' => 'Número',
            'consolidado' => 'Consolidado',
            'cliente' => 'Cliente',
            'contenido' => 'Contenido',
            'conductor' => 'Conductor',
            'vehiculo' => 'Vehículo',
            'reempacador' => 'Reempacador',
            'codigor' => 'Código R',
        ];
    }
}
