<?php

namespace App;

use App\Ahex\Fake\Domain\Fakeuser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Ahex\Zkeleton\Domain\ModifiersTrait as Modifiers;

class Codigor extends Model
{
    use HasFactory, SoftDeletes, Modifiers;

    protected $table = 'codigosr';

    protected $fillable = [
        'nombre',
        'descripcion',
        'created_by',
        'updated_by',
    ];

    public function haveDescription()
    {
        return blank($this->description);
    }

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
