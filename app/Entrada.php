<?php

namespace App;

use App\Ahex\Entrada\Domain\Attributes;
use App\Ahex\Entrada\Domain\FiltersByRequest;
use App\Ahex\Entrada\Domain\Relationships;
use App\Ahex\Entrada\Domain\Scopes;
use App\Ahex\Entrada\Domain\Topics\Confirmado as ConfirmadoTopic;
use App\Ahex\Entrada\Domain\Topics\Importado as ImportadoTopic;
use App\Ahex\Entrada\Domain\Topics\Reempacado as ReempacadTopic;
use App\Ahex\Entrada\Domain\UpdatesDescriptionsTrait as UpdatesDescriptions;
use App\Ahex\Entrada\Domain\Validations;
use App\Ahex\Zowner\Domain\Contracts\ModifierIdentifiable;
use App\Ahex\Zowner\Domain\Features\HasModifiers;
use App\Ahex\Zowner\Domain\Features\UpdateDescriptionHandler;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model implements ModifierIdentifiable
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
        UpdateDescriptionHandler;
    
    const SIN_CONSOLIDADO = false;

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

    public static function prepareWithConsolidado(array $validated)
    {
        if( isset($validated['consolidado_numero']) )
            return Consolidado::findByNumero($validated['consolidado_numero']);

        if( isset($validated['consolidado']) )
            return Consolidado::find($validated['consolidado']);

        return self::SIN_CONSOLIDADO;
    }

    public static function prepare(array $validated)
    {
        $consolidado = self::prepareWithConsolidado($validated);

        $prepared = [
            'numero' => $validated['numero'],
            'cliente_id' => $consolidado ? $consolidado->cliente_id : $validated['cliente'],
            'consolidado_id' => $consolidado ? $consolidado->id : null,
            'contenido' => $validated['contenido'] ?? null,
            'updated_by' => auth()->user()->id,
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = $prepared['updated_by'];

        return $prepared;
    }
}
