<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Ahex\Zkeleton\Domain\ModifiersTrait as Modifiers;

class Cliente extends Model
{
    use HasFactory, SoftDeletes, Modifiers;
    
    protected $fillable = array(
        'nombre',
        'alias',
        'contacto',
        'telefono',
        'correo_electronico',
        'direccion',
        'ciudad',
        'estado',
        'pais',
        'notas',
        'created_by',
        'updated_by',
    );

    public function consolidados()
    {
        return $this->hasMany(Consolidado::class);
    }

    public function entradas()
    {
        return $this->hasMany(Entrada::class);
    }

    public function getNombreConAliasAttribute()
    {
        return "{$this->nombre} ({$this->alias})";
    }

    public function getLocalidadAttribute()
    {
        $filtered = array_filter([$this->ciudad, $this->estado, $this->pais]);
        return implode(', ', $filtered);
    }

    public static function prepare($validated)
    {
        $user_id = mt_rand(1,10);

        $prepared = [
            'nombre' => $validated['nombre'],
            'alias' => strtoupper($validated['alias']),
            'contacto' => capitalize($validated['contacto']),
            'telefono' => $validated['telefono'],
            'correo_electronico' => strtolower($validated['correo_electronico']),
            'direccion' => capitalize($validated['direccion']),
            'ciudad' => capitalize($validated['ciudad']),
            'estado' => capitalize($validated['estado']),
            'pais' => $validated['pais'],
            'notas'  => $validated['notas'],
            'updated_by' => mt_rand(1,10),
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = $prepared['updated_by'];

        return $prepared;
    }
}
