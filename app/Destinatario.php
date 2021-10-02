<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Ahex\Zkeleton\Domain\SearchInterface as Search;
use App\Ahex\Zkeleton\Domain\ModifiersTrait as Modifiers;
use App\Ahex\GuiaImpresion\Application\ModelAttributesPrintableInterface as ModelAttributesPrintable;

class Destinatario extends Model implements Search, ModelAttributesPrintable
{
    use HasFactory, SoftDeletes, Modifiers;

    protected $fillable = array(
        'nombre',
        'direccion',
        'postal',
        'ciudad',
        'estado',
        'pais',
        'referencias',
        'telefono',
        'notas',
        'created_by',
        'updated_by',
    );



    /** Attributes */

    public function getLocalidadAttribute()
    {
        $localidad = array();

        foreach(['ciudad','estado','pais',] as $attr)
        {
            if( isset($this->$attr) )
                array_push($localidad, $this->$attr);
        }

        return implode(', ', $localidad);
    }

    public function getDomicilioStickerAttribute()
    {
        return "{$this->direccion}<br>
                Postal {$this->postal}<br>
                {$this->localidad}";
    }



    /** Scopes */

    public function scopeSearch($query, $value)
    {
        return $query->where('nombre', 'like', "%{$value}%")
                    ->orWhere('direccion', 'like', "%{$value}%")
                    ->orWhere('postal', 'like', "%{$value}%")
                    ->orWhere('ciudad', 'like', "%{$value}%")
                    ->orWhere('telefono', 'like', "%{$value}%")
                    ->orderBy('id', 'desc')
                    ->get();
    }



    /** Validations */

    public function haveRelationEntrada($entrada_id)
    {
        return Entrada::where('destinatario_id', $this->id)
                      ->where('id', $entrada_id)
                      ->exists();
    }



    /** Relationships */

    public function entradas()
    {
        return $this->hasMany(Entrada::class);
    }



    /** Statics */

    public static function prepare($validated)
    {
        $prepared = [
            'nombre' => capitalize($validated['nombre']),
            'direccion' => capitalize($validated['direccion']),
            'postal' => $validated['postal'],
            'ciudad' => capitalize($validated['ciudad']),
            'estado' => capitalize($validated['estado']),
            'pais' => capitalize($validated['pais']),
            'referencias' => $validated['referencias'] ?? null,
            'telefono' => $validated['telefono'],
            'notas' => $validated['notas'] ?? null,
            'updated_by' => mt_rand(1,10),
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = $prepared['updated_by'];

        return $prepared;
    }

    public static function attributesToPrint(): array
    {
        return [
            'nombre' => 'Nombre',
            'direccion' => 'Dirección',
            'postal' => 'Postal',
            'ciudad' => 'Ciudad',
            'estado' => 'Estado',
            'pais' => 'Pais',
            'referencias' => 'Referencias',
            'telefono' => 'Teléfono',
            'notas' => 'Notas',
        ];
    }
}
