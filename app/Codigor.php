<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Ahex\Zkeleton\Domain\ModifiersTrait as Modifiers;
use App\Ahex\Fake\Domain\Fakeuser;

class Codigor extends Model
{
    use SoftDeletes, Modifiers;

    protected $table = 'codigos_reempacado';

    protected $fillable = [
        'nombre',
        'descripcion',
        'created_by',
        'updated_by',
    ];

    public static function prepare($validated)
    {
        $prepared = [
            'nombre'      => $validated['nombre'],
            'descripcion' => $validated['descripcion'],
            'updated_by'  => Fakeuser::live(),
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = Fakeuser::live();

        return $prepared;
    }
}
