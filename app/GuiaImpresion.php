<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ahex\GuiaImpresion\Domain\Actions;
use App\Ahex\GuiaImpresion\Domain\Attributes;
use App\Ahex\GuiaImpresion\Domain\Scopes;
use App\Ahex\GuiaImpresion\Domain\Validations;
use App\Ahex\GuiaImpresion\Infrastructure\PageDesigner\PageDesigner;

class GuiaImpresion extends Model
{   
    use Actions,
        Attributes,
        Scopes,
        Validations;

    protected $table = 'guias_impresion';
    
    protected $fillable = [
        'nombre',
        'descripcion',
        'formato_encoded',
        'margenes_encoded',
        'tipografia_encoded',
        'informacion_encoded',
        'informacion_final',
        'tipo_descripcion_informacion',
        'activada',
        'intentos_impresion',
    ];

    public static function prepare($validated)
    {
        $prepared = [
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'] ?? null,
            'formato_encoded' => static::prepareFormato($validated['formato']),
            'margenes_encoded' => static::prepareMargenes($validated['margenes']),
            'tipografia_encoded' => static::prepareTipografia($validated['tipografia']),
            'informacion_encoded' => static::prepareInformacion($validated['informacion']),
            'informacion_final' => $validated['informacion_final'] ?? null,
            'tipo_descripcion_informacion' => $validated['tipo_descripcion'] ?? null,
            'activada' => isset($validated['desactivar']) ? 0 : 1,
        ];

        if( isset( $validated['resetear'] ) )
            $prepared['intentos_impresion'] = 0;

        return $prepared;
    }

    private static function prepareFormato($formato)
    {
        return json_encode([
            'ancho' => $formato['ancho'] ?? null,
            'alto' => $formato['alto'] ?? null,
            'medicion' => ! PageDesigner::existsMeasurement($formato['medicion']) 
                          ? PageDesigner::defaultMeasurement()
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
            'medicion' => ! PageDesigner::existsMeasurement($margenes['medicion'])
                          ? PageDesigner::defaultMeasurement()
                          : $margenes['medicion'],
            ]);
    }

    private static function prepareTipografia($tipografia)
    {
        return json_encode([
            'alineacion' => $tipografia['alineacion'],
            'fuente' => ! PageDesigner::existsFont($tipografia['fuente']) 
                        ? PageDesigner::defaultFont() 
                        : $tipografia['fuente'],
            'medicion' => ! PageDesigner::existsFontMeasurement($tipografia['medicion']) 
                          ? PageDesigner::defaultFontMeasurement() 
                          : $tipografia['medicion'],
            'tamano' => (float) $tipografia['tamano'] 
                        ?? PageDesigner::DEFAULT_FONT_SIZE,
            'interlineado' => PageDesigner::defaultLineHeight(),
        ]);
    }

    private static function prepareInformacion($informacion)
    {
        return json_encode($informacion);
    }
}
