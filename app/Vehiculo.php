<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Ahex\Fake\Domain\Fakeuser;

class Vehiculo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'alias',
        'descripcion',
        'created_by',
        'updated_by',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function entradas()
    {
        return $this->hasMany(Entrada::class);
    }

    public static function prepare($validated)
    {
        $prepared = [
            'alias' => $validated['alias'],
            'descripcion' => $validated['descripcion'],
            'updated_by' => Fakeuser::live(),
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = Fakeuser::live();

        return $prepared;
    }
}
