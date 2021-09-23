<?php

namespace App;

use App\Ahex\Fake\Domain\Fakeuser;
use Illuminate\Database\Eloquent\Model;
use App\Ahex\Zkeleton\Domain\ModifiersTrait as Modifiers;

class Alerta extends Model
{    
    use Modifiers;

    const NIVEL_NO_EXISTE = null;
    
    protected $fillable = [
        'nivel',
        'nombre',
        'descripcion',
        'created_by',
        'updated_by',
    ];

    public static $niveles = [
        'alto' => [
            'color' => '#FE0606',
            'descripcion' => 'Detener el proceso e intervenir para una solucíon.',
        ],
        'medio' => [
            'color' => '#FE7806',
            'descripcion' => 'Intervenir para solucionar pero no detener el proceso.',
        ],
        'bajo' => [
            'color' => '#FEC006',
            'descripcion' => 'No es necesario internvenir ni detener el proceso.',
        ],
    ];

    
    /** Attributes */
    public function getColorAttribute()
    {
        return static::getNivel($this->nivel, 'color');
    }

    public function getDescripcionAttribute()
    {
        return static::getNivel($this->nivel, 'descripcion');
    }


    /** Statics */
    public static function allNiveles()
    {
        return static::$niveles;
    }
    
    public static function getNombresNiveles()
    {
        return array_keys(static::$niveles);
    }

    public static function existsNivel($key, $attr = null)
    {
        if( ! is_string($attr) )
            return isset(static::$niveles[$key]);

        return isset(static::$niveles[$key][$attr]);
    }

    public static function getNivel($key, $attr = null)
    {
        if( static::existsNivel($key) && ! is_string($attr) )
            return static::$niveles[$key];

        if( static::existsNivel($key, $attr) )
            return static::$niveles[$key][$attr];

        return static::NIVEL_NO_EXISTE;
    }

    public static function prepare($validated)
    {
        $prepared = [
            'nivel'       => $validated['nivel'],
            'nombre'      => $validated['nombre'],
            'updated_by'  => Fakeuser::live(),
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = Fakeuser::live();

        return $prepared;
    }
}
