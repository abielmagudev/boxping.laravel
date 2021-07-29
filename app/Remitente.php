<?php

namespace App;

use App\Ahex\Fake\Domain\Fakeuser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Ahex\Zkeleton\Domain\SearchInterface as Search;
use App\Ahex\Zkeleton\Domain\ModifiersTrait as Modifiers;

Class Remitente extends Model implements Search
{
    use SoftDeletes, Modifiers;

    protected $fillable = array(
        'nombre',
        'direccion',
        'postal',
        'ciudad',
        'estado',
        'pais',
        'telefono',
        'notas',
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
                     ->orWhere('postal', 'like', "%{$value}%")
                     ->orWhere('telefono', 'like', "%{$value}%")
                     ->orWhere('ciudad', 'like', "%{$value}%")
                     ->orderBy('id', 'desc')
                     ->get();
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
            'telefono' => $validated['telefono'],
            'notas' => $validated['notas'] ?? null,
            'updated_by' => Fakeuser::live(),
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = Fakeuser::live();

        return $prepared;
    }
}
