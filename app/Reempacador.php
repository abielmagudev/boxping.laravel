<?php

namespace App;

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
            'updated_by'  => mt_rand(1,10),
        ];

        if( isset($validated['clave']) )
            $prepared['clave'] = hash('gost', $validated['clave']);

        if( request()->isMethod('post') )
            $prepared['created_by'] = $prepared['updated_by'];

        return $prepared;
    }
}
