<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ahex\GuiaImpresion\Domain\Actions;
use App\Ahex\GuiaImpresion\Domain\Attributes;
use App\Ahex\GuiaImpresion\Domain\PageMeasurement;
use App\Ahex\GuiaImpresion\Domain\PageTypography;
use App\Ahex\GuiaImpresion\Domain\Validations;

class GuiaImpresion extends Model
{   
    use Actions,
        Attributes,
        PageMeasurement,
        PageTypography,
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
        return json_encode([
            'ancho' => $formato['ancho'] ?? null,
            'altura' => $formato['altura'] ?? null,
            'medicion' => ! self::existsPageMeasurement($formato['medicion']) 
                          ? self::defaultPageMeasurement()
                          : $formato['medicion'],
        ]);
    }

    private static function prepareMargenes($margenes)
    {
        return json_encode([
            'arriba' => $margenes['arriba'] ?? null,
            'derecha' => $margenes['derecha'] ?? null,
            'abajo' => $margenes['abajo'] ?? null,
            'izquierda' => $margenes['izquierda'] ?? null,
            'medicion' => ! self::existsPageMeasurement($margenes['medicion'])
                          ? self::defaultPageMeasurement()
                          : $margenes['medicion'],
            ]);
    }

    private static function prepareTipografia($tipografia)
    {
        return json_encode([
            'interlineado' => 0.5,
            'fuente' => ! self::existsFontName($tipografia['fuente']) ? self::defaultFontName() : $tipografia['fuente'],
            'medicion' => ! self::existsFontMeasurement($tipografia['medicion']) ? self::defaultFontMeasurement() : $tipografia['medicion'],
            'tamano' => (float) $tipografia['tamano'] ?? 12,
        ]);
    }

    private static function prepareContenido($contenido)
    {
        return json_encode($contenido);
    }
}
