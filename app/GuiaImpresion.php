<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ahex\GuiaImpresion\Domain\Actions;
use App\Ahex\GuiaImpresion\Domain\Attributes;
use App\Ahex\GuiaImpresion\Domain\PageMeasurement;
use App\Ahex\GuiaImpresion\Domain\PageTypography;
use App\Ahex\GuiaImpresion\Domain\PageContent;
use App\Ahex\GuiaImpresion\Domain\Scopes;
use App\Ahex\GuiaImpresion\Domain\Validations;

class GuiaImpresion extends Model
{   
    use Actions,
        Attributes,
        PageMeasurement,
        PageTypography,
        PageContent,
        Scopes,
        Validations;

    protected $table = 'guias_impresion';
    
    protected $fillable = [
        'nombre',
        'descripcion',
        'formato_encoded',
        'margenes_encoded',
        'tipografia_encoded',
        'contenido_encoded',
        'texto_final',
        'activada',
        'intentos_impresion',
    ];

    public static function prepare($validated)
    {
        return [
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'] ?? null,
            'formato_encoded' => static::prepareFormato($validated['formato']),
            'margenes_encoded' => static::prepareMargenes($validated['margenes']),
            'tipografia_encoded' => static::prepareTipografia($validated['tipografia']),
            'contenido_encoded' => static::prepareContenido($validated['contenido']),
            'texto_final' => $validated['texto_final'] ?? null,
            'activada' => isset($validated['desactivar']) ? 0 : 1,
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
            'fuente' => ! self::existsFontName($tipografia['fuente']) ? self::defaultFontName() : $tipografia['fuente'],
            'medicion' => ! self::existsFontMeasurement($tipografia['medicion']) ? self::defaultFontMeasurement() : $tipografia['medicion'],
            'tamano' => (float) $tipografia['tamano'] ?? self::defaultFontSize(),
            'interlineado' => self::defaultLineHeight(),
        ]);
    }

    private static function prepareContenido($contenido)
    {
        return json_encode($contenido);
    }

    public static function allPageSettings()
    {
        return (object) [
            'mediciones' => self::allPageMeasurements(),
            'tipografia' => (object) [
                'fuentes' => self::allFontNames(),
                'mediciones' => self::allFontMeasurements(),
            ],
            'contenidos' => self::allPageContents(),
        ];
    }
}
