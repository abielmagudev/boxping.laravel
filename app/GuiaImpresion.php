<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuiaImpresion extends Model
{
    protected $table = 'guias_impresion';

    protected $fillable = [
        'nombre',
        'formato',
        'margenes',
        'tipografia',
        'contenido',
        'intentos',
    ];

    public function haveContenido($type = null, $attr = null)
    {
        if( is_string($type) && is_string($attr) )
            return isset($this->contenido->{$type}->{$attr});

        if( is_string($type) )
            return isset($this->contenido->{$type});

        return isset($this->contenido);
    }

    protected static function booted()
    {
        static::retrieved(function ($guia) {
            $guia->formato    = json_decode($guia->formato);
            $guia->margenes   = json_decode($guia->margenes);
            $guia->tipografia = json_decode($guia->tipografia);
            $guia->contenido  = json_decode($guia->contenido);
        });
    }

    public static function prepare($validated)
    {
        return [
            'nombre' => $validated['nombre'],
            'formato' => static::prepareFormato($validated['formato']),
            'margenes' => static::prepareMargenes($validated['margenes']),
            'tipografia' => static::prepareTipografia($validated['tipografia']),
            'contenido' => static::prepareContenido($validated['contenido']),
        ];
    }

    private static function prepareFormato($formato)
    {
        $area = config('system.medidas.area');

        return json_encode([
            'ancho' => $formato['ancho'] ?? null,
            'altura' => $formato['altura'] ?? null,
            'medicion' => array_key_exists($formato['medicion'], $area) ? $formato['medicion'] : array_key_first($area),
        ]);
    }

    private static function prepareMargenes($margenes)
    {
        $area = config('system.medidas.area');

        return json_encode([
            'arriba' => $margenes['arriba'] ?? null,
            'derecha' => $margenes['derecha'] ?? null,
            'abajo' => $margenes['abajo'] ?? null,
            'izquierda' => $margenes['izquierda'] ?? null,
            'medicion' => array_key_exists($margenes['medicion'], $area) ? $margenes['medicion'] : array_key_first($area),
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
