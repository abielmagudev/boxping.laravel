<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ahex\GuiaImpresion\Domain\Attributes;
use App\Ahex\GuiaImpresion\Domain\Validations;
use App\Ahex\GuiaImpresion\Domain\Actions;

class GuiaImpresion extends Model
{   
    use Attributes,
        Actions,
        Validations;

    protected $table = 'guias_impresion';
    
    protected $fillable = [
        'nombre',
        'formato_json',
        'margenes_json',
        'tipografia_json',
        'contenido_json',
        'intentos',
    ];

    public static function prepare($validated)
    {
        return [
            'nombre' => $validated['nombre'],
            'formato_json' => static::prepareFormato($validated['formato']),
            'margenes_json' => static::prepareMargenes($validated['margenes']),
            'tipografia_json' => static::prepareTipografia($validated['tipografia']),
            'contenido_json' => static::prepareContenido($validated['contenido']),
        ];
    }

    private static function prepareFormato($formato)
    {
        $longitud = config('system.mediciones.longitud');

        return json_encode([
            'ancho' => $formato['ancho'] ?? null,
            'altura' => $formato['altura'] ?? null,
            'medicion' => array_key_exists($formato['medicion'], $longitud) ? $formato['medicion'] : array_key_first($longitud),
        ]);
    }

    private static function prepareMargenes($margenes)
    {
        $longitud = config('system.mediciones.longitud');

        return json_encode([
            'arriba' => $margenes['arriba'] ?? null,
            'derecha' => $margenes['derecha'] ?? null,
            'abajo' => $margenes['abajo'] ?? null,
            'izquierda' => $margenes['izquierda'] ?? null,
            'medicion' => array_key_exists($margenes['medicion'], $longitud) ? $margenes['medicion'] : array_key_first($longitud),
        ]);
    }

    private static function prepareTipografia($tipografia)
    {
        $config = config('system.tipografias');

        return json_encode([
            'fuente' => array_key_exists($tipografia['fuente'], $config['fuentes']) ? $tipografia['fuente'] : array_key_first($config['fuentes']),
            'tamano' => (float) $tipografia['tamano'] ?? 12,
            'medicion' => array_key_exists($tipografia['medicion'], $config['mediciones']) ? $tipografia['medicion'] : array_key_first($config['mediciones']),
            'interlineado' => 0.5,
        ]);
    }

    private static function prepareContenido($contenido)
    {
        return json_encode($contenido);
    }
}
