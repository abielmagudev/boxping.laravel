<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Ahex\Zowner\Domain\Contracts\ValueSearchable;
use App\Ahex\Zowner\Domain\Contracts\ModifierIdentifiable;
use App\Ahex\Zowner\Domain\Features\HasModifiers;

use App\Ahex\GuiaImpresion\Infrastructure\PrintableContentContract as PrintableContent;

class Destinatario extends Model implements ModifierIdentifiable, ValueSearchable, PrintableContent
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

    public function getDomicilioCompletoAttribute()
    {
        return "{$this->direccion}, Postal {$this->postal} <br> {$this->localidad}";
    }



    /** Scopes */

    public function scopeSearch($query, $value)
    {
        return $query->where('nombre', 'like', "%{$value}%")
                    ->orWhere('direccion', 'like', "%{$value}%")
                    ->orWhere('postal', 'like', "%{$value}%")
                    ->orWhere('ciudad', 'like', "%{$value}%")
                    ->orWhere('telefono', 'like', "%{$value}%")
                    ->orderBy('id', 'desc');
    }



    /** Validations */

    public function hasRelationEntrada($entrada_id)
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
            'updated_by' => auth()->user()->id,
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = $prepared['updated_by'];

        return $prepared;
    }

    public static function contentForPrintingGuide(): array
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
