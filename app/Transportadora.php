<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Ahex\Zowner\Domain\Contracts\ModifierIdentifiable;
use App\Ahex\Zowner\Domain\Features\HasModifiers;

class Transportadora extends Model implements ModifierIdentifiable
{
    use HasFactory,
        SoftDeletes, 
        HasModifiers;

    protected $fillable = [
        'nombre',
        'web',
        'telefono',
        'notas',
        'created_by',
        'updated_by',
    ];

    public function salidas()
    {
        return $this->hasMany(Salida::class);
    }

    public function hasWeb()
    {
        return (bool) isset($this->web) && filter_var($this->web, FILTER_VALIDATE_URL);
    }

    public static function prepare($validated)
    {
        $prepared = [
            'nombre' => $validated['nombre'],
            'web' => $validated['web'] ?? null,
            'telefono' => $validated['telefono'] ?? null,
            'notas'  => $validated['notas'] ?? null,
            'updated_by' => auth()->user()->id,
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = $prepared['updated_by'];

        return $prepared;
    }
}
