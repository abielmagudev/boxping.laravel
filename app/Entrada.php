<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ahex\Entrada\Domain\RelationshipsTrait as Relationships;
use App\Ahex\Entrada\Domain\AttributesTrait as Attributes;
use App\Ahex\Entrada\Domain\ScopesTrait as Scopes;
use App\Ahex\Fake\Domain\Fakeuser;

class Entrada extends Model
{
    use Relationships, Attributes, Scopes;
    
    const SIN_CONSOLIDADO = null;

    protected $fillable = array(
        // Entrada
        'numero',
        'consolidado_id',
        'cliente_id',
        'cliente_alias_numero',

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
        $consolidado = self::findConsolidado($validated);

        $prepared = [
            'numero' => $validated['numero'],
            'consolidado_id' => $consolidado->id ?? null,
            'cliente_id' => $consolidado->cliente_id ?? $validated['cliente'],
            'cliente_alias_numero' => isset($validated['cliente_alias_numero']) ? 1 : 0,
            'updated_by' => Fakeuser::live(),
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = Fakeuser::live();

        return $prepared;
    }

    private static function findConsolidado($validated)
    {
        if( isset($validated['consolidado_numero']) )
            return Consolidado::where('numero', $validated['consolidado_numero'])->first();

        if( isset($validated['consolidado']) )
            return Consolidado::find($validated['consolidado']);  
        
        return self::SIN_CONSOLIDADO;
    }
}
