<?php

namespace App;

use App\Ahex\Fake\Domain\Fakeuser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Ahex\Zkeleton\Domain\SearchInterface as Search;
use App\Ahex\Zkeleton\Domain\ModifiersTrait as Modifiers;

class Destinatario extends Model implements Search
{
    use SoftDeletes, Modifiers;

    protected $fillable = array(
        'nombre',
        'direccion',
        'postal',
        'ciudad',
        'estado',
        'pais',
        'referencias',
        'telefono',
        'created_by',
        'updated_by',
    );

    public function entradas()
    {
        return $this->hasMany(Entrada::class);
    }

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

    public function scopeSearch($query, $value)
    {
        return $query->where('nombre', 'like', "%{$value}%")
                    ->orWhere('direccion', 'like', "%{$value}%")
                    ->orWhere('codigo_postal', 'like', "%{$value}%")
                    ->orWhere('ciudad', 'like', "%{$value}%")
                    ->orWhere('telefono', 'like', "%{$value}%")
                    ->orderBy('id', 'desc')
                    ->get();
    }

    public function haveRelationEntrada($entrada_id)
    {
        return Entrada::where('destinatario_id', $this->id)
                      ->where('id', $entrada_id)
                      ->exists();
    }

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
            'updated_by' => Fakeuser::live(),
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = Fakeuser::live();

        return $prepared;
    }
}
