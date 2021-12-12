<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Ahex\Consolidado\Domain\Attributes;
use App\Ahex\Consolidado\Domain\Scopes;
use App\Ahex\Consolidado\Domain\Validations;
use App\Ahex\Consolidado\Domain\Relationships;
use App\Ahex\Consolidado\Domain\EntradasHandler;
use App\Ahex\Zowner\Domain\Contracts\ValueSearchable;
use App\Ahex\Zowner\Domain\Contracts\ModifierIdentifiable;
use App\Ahex\Zowner\Domain\Features\HasModifiers;

class Consolidado extends Model implements ModifierIdentifiable, ValueSearchable
{
    use HasFactory, 
        Attributes,
        Scopes,
        Validations,
        Relationships,
        EntradasHandler,
        HasModifiers;

    const STATUS_NO_EXISTE = null;
    
    protected $fillable = array(
        'numero',
        'tarimas',
        'status',
        'notas',
        'cliente_id',
        'created_by',
        'updated_by',
    );

    public static $all_status = [
        'abierto' => [
            'color' => '#FFC108',
            'descripcion' => 'Entradas pendientes y disponible para agregar entradas.',
        ],
        'cerrado' => [
            'color' => '#6D757D',
            'descripcion' => 'Entradas terminadas, imposible agregar entradas.',
        ],
    ];

    public static function prepare($validated)
    {
        $prepared = [
            'numero'     => $validated['numero'],
            'tarimas'    => $validated['tarimas'],
            'status'     => $validated['status'] ?? 'abierto',
            'notas'      => $validated['notas'],
            'cliente_id' => $validated['cliente'],
            'updated_by' => auth()->user()->id,
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = $prepared['updated_by'];

        return $prepared;
    }
}
