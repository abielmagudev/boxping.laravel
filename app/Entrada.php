<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Ahex\Entrada\Domain\Topics\Confirmado as ConfirmadoTopic;
use App\Ahex\Entrada\Domain\Topics\Importado as ImportadoTopic;
use App\Ahex\Entrada\Domain\Topics\Reempacado as ReempacadTopic;
use App\Ahex\Entrada\Domain\Attributes;
use App\Ahex\Entrada\Domain\Relationships;
use App\Ahex\Entrada\Domain\Validations;
use App\Ahex\Entrada\Domain\Scopes;
use App\Ahex\Entrada\Domain\FiltersByRequest;

use App\Ahex\Entrada\Domain\UpdatesDescriptionsTrait as UpdatesDescriptions;
use App\Ahex\Zkeleton\Domain\UpdateDescriptionCallableTrait as UpdateDescriptionCallable;

use App\Ahex\Zowner\Domain\Contracts\ModifierIdentifiable;
use App\Ahex\Zowner\Domain\Features\HasModifiers;

use App\Ahex\GuiaImpresion\Application\ModelAttributesPrintableInterface as ModelAttributesPrintable;

class Entrada extends Model implements ModifierIdentifiable, ModelAttributesPrintable
{
    use HasFactory,
        ConfirmadoTopic,
        ImportadoTopic,
        ReempacadTopic,
        Attributes,
        Relationships,
        Validations,
        Scopes,
        FiltersByRequest,
        HasModifiers,
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

        // Importado
        'vehiculo_id',
        'conductor_id',
        'numero_cruce',
        'importado_fecha',
        'importado_hora',

        // Reempacado
        'codigor_id',
        'reempacador_id',
        'reempacado_fecha',
        'reempacado_hora',

        // Confirmado
        'confirmado_by',
        'confirmado_at',

        // Log
        'created_by',
        'updated_by',
    );

    protected $casts = [
        'importado_fecha' => 'datetime',
        'importado_hora' => 'datetime',
        'reempacado_fecha' => 'datetime',
        'reempacado_hora' => 'datetime',
        'confirmado_at' => 'datetime',
    ];

    public static function prepare($validated)
    {
        $consolidado_number_id = $validated['consolidado_numero'] ?? $validated['consolidado'] ?? 0;
        $consolidado = Consolidado::searchForceToEntrada( $consolidado_number_id );

        $prepared = [
            'numero' => $validated['numero'],
            'consolidado_id' => $consolidado->id ?? null,
            'cliente_id' => $consolidado->cliente_id ?? $validated['cliente'],
            'contenido' => $validated['contenido'] ?? null,
            'updated_by' => auth()->user()->id,
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
