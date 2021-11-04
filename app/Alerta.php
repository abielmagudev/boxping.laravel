<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Ahex\Zowner\Domain\Contracts\ModifierIdentifiable;
use App\Ahex\Zowner\Domain\Features\HasModifiers;

class Alerta extends Model implements ModifierIdentifiable
{    
    use HasFactory,
        HasModifiers;

    const NIVEL_NO_EXISTE = null;
    
    protected $fillable = [
        'nivel',
        'nombre',
        'created_by',
        'updated_by',
    ];

    public static $niveles = [
        'alto' => [
            'color' => '#FE0606',
            'descripcion' => 'Detener el proceso e intervenir para una solución.',
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
    public static function getAllNiveles($return_object = false)
    {
        return $return_object ? (object) static::$niveles : static::$niveles;
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
            'updated_by'  => auth()->user()->id,
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = $prepared['updated_by'];

        return $prepared;
    }
}
