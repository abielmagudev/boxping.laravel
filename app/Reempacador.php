<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Ahex\Zowner\Domain\Contracts\ModifierIdentifiable;
use App\Ahex\Zowner\Domain\Features\HasModifiers;

class Reempacador extends Model implements ModifierIdentifiable
{
    use HasFactory,
        SoftDeletes, 
        HasModifiers;

    protected $table = 'reempacadores';

    protected $fillable = [
        'nombre',
        'clave',
        'created_by',
        'updated_by',
    ];

    public static function prepare($validated)
    {
        $prepared = [
            'nombre' => $validated['nombre'],
            'updated_by'  => auth()->user()->id,
        ];

        if( isset($validated['clave']) )
            $prepared['clave'] = hash('gost', $validated['clave']);

        if( request()->isMethod('post') )
            $prepared['created_by'] = $prepared['updated_by'];

        return $prepared;
    }
}
