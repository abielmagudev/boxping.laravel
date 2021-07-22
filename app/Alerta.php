<?php

namespace App;

use App\Ahex\Fake\Domain\Fakeuser;
use Illuminate\Database\Eloquent\Model;
use App\Ahex\Zkeleton\Domain\ModifiersTrait as Modifiers;

class Alerta extends Model
{    
    use Modifiers;
    
    protected $fillable = [
        'nivel',
        'nombre',
        'descripcion',
        'created_by',
        'updated_by',
    ];

    public function getColorAttribute()
    {
        return config("system.alertas.{$this->nivel}.color");
    }

    public function getDescripcionNivelAttribute()
    {
        return config("system.alertas.{$this->nivel}.descripcion");
    }

    public static function prepare($validated)
    {
        $prepared = [
            'nivel'       => $validated['nivel'],
            'nombre'      => $validated['nombre'],
            'descripcion' => $validated['descripcion'],
            'updated_by'  => Fakeuser::live(),
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = Fakeuser::live();

        return $prepared;
    }
}
