<?php

namespace App;

use App\Ahex\Fake\Domain\Fakeuser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Ahex\Zkeleton\Domain\ModifiersTrait as Modifiers;

class Transportadora extends Model
{
    use HasFactory, SoftDeletes, Modifiers;

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

    public static function prepare($validated)
    {
        $prepared = [
            'nombre' => $validated['nombre'],
            'web' => $validated['web'] ?? null,
            'telefono' => $validated['telefono'] ?? null,
            'notas'  => $validated['notas'] ?? null,
            'updated_by' => Fakeuser::live(),
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = Fakeuser::live();

        return $prepared;
    }
}
