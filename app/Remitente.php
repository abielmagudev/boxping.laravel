<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Ahex\Zowner\Domain\Contracts\ValueSearchable;
use App\Ahex\Zowner\Domain\Contracts\ModifierIdentifiable;
use App\Ahex\Zowner\Domain\Features\HasModifiers;

Class Remitente extends Model implements ValueSearchable, ModifierIdentifiable
{
    use HasFactory, 
        SoftDeletes, 
        HasModifiers;

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


    // Relationships

    public function entradas()
    {
        return $this->hasMany(Entrada::class);
    }


    // Attributes

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

    public function getDomicilioCompletoAttribute()
    {
        return "{$this->direccion}, Postal {$this->postal} <br> {$this->localidad}";
    }

    public function getInformacionCompletaAttribute()
    {
        return "{$this->domicilio_completo} <br> {$this->telefono}";
    }


    // Scopes

    public function scopeSearch($query, $value)
    {
        return $query->where('nombre', 'like', "%{$value}%")
                    ->orWhere('direccion', 'like', "%{$value}%")
                    ->orWhere('postal', 'like', "%{$value}%")
                    ->orWhere('telefono', 'like', "%{$value}%")
                    ->orWhere('ciudad', 'like', "%{$value}%")
                    ->orderBy('id', 'desc');
    }

    public function scopeExistsExactly($query, array $data)
    {
        return $query->where('nombre', $data['nombre'])
                    ->where('direccion', $data['direccion'])
                    ->where('postal', $data['postal'])
                    ->where('ciudad', $data['ciudad'])
                    ->where('estado', $data['estado'])
                    ->where('pais', $data['pais'])
                    ->where('telefono', $data['telefono'])
                    ->exists();
    }

    public function scopeFindExactly($query, array $data)
    {
        return $query->where('nombre', $data['nombre'])
                    ->where('direccion', $data['direccion'])
                    ->where('postal', $data['postal'])
                    ->where('ciudad', $data['ciudad'])
                    ->where('estado', $data['estado'])
                    ->where('pais', $data['pais'])
                    ->where('telefono', $data['telefono'])
                    ->orderBy('id', 'ASC')
                    ->first();
    }


    // Statics
    
    public static function prepare($validated)
    {
        $prepared = [
            'nombre' => trim(capitalize($validated['nombre'])),
            'direccion' => trim(capitalize($validated['direccion'])),
            'postal' => trim($validated['postal']),
            'ciudad' => trim(capitalize($validated['ciudad'])),
            'estado' => trim(capitalize($validated['estado'])),
            'pais' => trim(capitalize($validated['pais'])),
            'telefono' => trim($validated['telefono']),
            'notas' => trim( $validated['notas']) ?? null,
            'updated_by' => auth()->user()->id,
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = $prepared['updated_by'];

        return $prepared;
    }
}
