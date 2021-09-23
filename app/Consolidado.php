<?php

namespace App;

use App\Ahex\Fake\Domain\Fakeuser;
use Illuminate\Database\Eloquent\Model;
use App\Ahex\Consolidado\Domain\Attributes;
use App\Ahex\Consolidado\Domain\Scopes;
use App\Ahex\Consolidado\Domain\Relationships;
use App\Ahex\Consolidado\Domain\EntradasHandler;
use App\Ahex\Zkeleton\Domain\SearchInterface as Search;
use App\Ahex\Zkeleton\Domain\ModifiersTrait as Modifiers;

class Consolidado extends Model implements Search
{
    use Attributes,
        Scopes,
        Relationships,
        EntradasHandler,
        Modifiers;

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
            'descripcion' => 'Es posible agregar entradas al consolidado',
        ],
        'cerrado' => [
            'color' => '#6D757D',
            'descripcion' => 'No es posible agregar entradas al consolidado',
        ],
    ];

    /**
     * 
     * En caso de no encontrar un consolidado existente, 
     * retornará un objeto vacio de Consolidado
     * para crear o actualiza una Entrada.
     * 
     * De manera forzada, siempre retornará un objeto de Consolidado
     * 
     * @return new Consolidado || Consolidado existente
     * 
     */
    public static function searchForceToEntrada($needle)
    {
        if( ! self::where('numero', $needle)->orWhere('id', $needle)->exists() )
            return new self; 
        
        return self::where('numero', $needle)->orWhere('id', $needle)->first();
    }

    public static function prepare($validated)
    {
        $prepared = [
            'numero'     => $validated['numero'],
            'tarimas'    => $validated['tarimas'],
            'status'     => isset($validated['status']) ? $validated['status'] : 'abierto',
            'notas'      => $validated['notas'],
            'cliente_id' => $validated['cliente'],
            'updated_by' => Fakeuser::live(),
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = Fakeuser::live();

        return $prepared;
    }
}
