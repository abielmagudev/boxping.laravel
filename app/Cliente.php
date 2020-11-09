<?php

namespace App;

use App\Ahex\Fake\Domain\Fakeuser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;
    
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

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function getLocalidadAttribute()
    {
        $filtered = array_filter([$this->ciudad, $this->estado, $this->pais]);
        return implode(', ', $filtered);
    }

    public static function prepare($validated)
    {
        $prepared = [
            'nombre' => $validated['nombre'],
            'alias' => $validated['alias'],
            'contacto' => $validated['contacto'],
            'telefono' => $validated['telefono'],
            'correo_electronico' => $validated['correo_electronico'],
            'direccion' => $validated['direccion'],
            'ciudad' => $validated['ciudad'],
            'estado' => $validated['estado'],
            'pais' => $validated['pais'],
            'notas'  => $validated['notas'],
            'updated_by' => Fakeuser::live(),
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = Fakeuser::live();

        return $prepared;
    }
}
