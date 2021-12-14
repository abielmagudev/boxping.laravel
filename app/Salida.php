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
use App\Ahex\GuiaImpresion\Infrastructure\PrintableContentContract as PrintableContent;

class Salida extends Model implements ModifierIdentifiable, PrintableContent
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

    public static $all_status = [
        'en espera' => [
            'color' => '#0E6FFD',
            'descripcion' => 'Recopilando información para el envio',
        ],
        'en ruta' => [
            'color' => '#FFC108',
            'descripcion' => 'Envio en proceso hacia su destino',
        ],
        'arribo' => [
            'color' => '#198754',
            'descripcion' => 'Finalizo en el envio a su destino',
        ],
        'entregado' => [
            'color' => '#212529',
            'descripcion' => 'Paquete recibido por el destinatario',
        ],
    ];

    public static $all_coberturas = [
        'domicilio' => [
            'descripcion' => 'Dirección del destinatario',
        ],
        'ocurre'    => [
            'descripcion' => 'Dirección de la transportadora',
        ],
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
            'status'       => $validated['status'] ?? array_key_first( static::getAllStatus() ),
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

    public static function contentForPrintingGuide(): array
    {
        return [
            'rastreo' => 'Rastreo',
            'confirmacion' => 'Confirmación',
            'cobertura' => 'Cobertura',
            'direccion' => 'Dirección',
            'postal' => 'Postal',
            'ciudad' => 'Ciudad',
            'estado' => 'Estado',
            'pais' => 'Pais',
            'notas' => 'Notas',
        ];
    }
}
