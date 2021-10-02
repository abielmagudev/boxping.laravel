<?php

namespace App;

use App\Ahex\Fake\Domain\Fakeuser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Ahex\Zkeleton\Domain\ModifiersTrait as Modifiers;

class Reempacador extends Model
{
    use HasFactory, SoftDeletes, Modifiers;

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
            'updated_by'  => Fakeuser::live(),
        ];

        if( isset($validated['clave']) )
            $prepared['clave'] = sha1($validated['clave']);

        if( request()->isMethod('post') )
            $prepared['created_by'] = Fakeuser::live();

        return $prepared;
    }
}
