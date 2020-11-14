<?php

namespace App;

use App\Ahex\Fake\Domain\Fakeuser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conductor extends Model
{
    use SoftDeletes;

    protected $table = 'conductores';

    protected $fillable = [
        'nombre',
        'created_by',
        'updated_by',
    ];

    public function entradas()
    {
        return $this->hasMany(Entrada::class);
    }

    public static function prepare($validated)
    {
        $prepared = [
            'nombre' => $validated['nombre'],
            'updated_by' => Fakeuser::live(),
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = Fakeuser::live();

        return $prepared;
    }
}
