<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuiaImpresion extends Model
{
    protected $table = 'guias_impresion';

    protected $fillable = [
        'nombre',
        'formato_json',
        'margenes_json',
        'tipografia_json',
        'contenido_json',
        'intentos',
    ];

    public function getFormatoAttribute()
    {
        return json_decode($this->formato_json);
    }

    public function getMargenesAttribute()
    {
        return json_decode($this->margenes_json);
    }

    public function getTipografiaAttribute()
    {
        return json_decode($this->tipografia_json);
    }

    public function getContenidoAttribute()
    {
        return json_decode($this->contenido_json);
    }

    public function getPageSizeAttribute()
    {
        $width  = $this->formato->ancho . $this->formato->medicion;
        $height = $this->formato->altura . $this->formato->medicion;
        return  "{$width} {$height}";
    }

    public function getPageMarginsAttribute()
    {
        $top    = ! is_null($this->margenes->arriba)    ? $this->margenes->arriba . $this->margenes->medicion : 'auto';
        $right  = ! is_null($this->margenes->derecha)   ? $this->margenes->derecha . $this->margenes->medicion : 'auto';
        $bottom = ! is_null($this->margenes->abajo)     ? $this->margenes->abajo . $this->margenes->medicion : 'auto';
        $left   = ! is_null($this->margenes->izquierda) ? $this->margenes->izquierda . $this->margenes->medicion : 'auto';
        return "{$top} {$right} {$bottom} {$left}";
    }

    public function getFontAttribute()
    {
        return ucwords( $this->tipografia->fuente );
    }

    public function getFontSizeAttribute()
    {
        return $this->tipografia->tamano . $this->tipografia->medicion;
    }

    public function haveContenido($type = null, $attr = null)
    {
        if( is_string($type) && is_string($attr) )
            return isset($this->contenido->{$type}->{$attr});

        if( is_string($type) )
            return isset($this->contenido->{$type});

        return isset($this->contenido);
    }

    public function incrementarIntentos()
    {
        $this->intentos++;
        return $this;
    }

    public static function getModelsContent()
    {
        return [
            'entrada' => Entrada::attributesToPrint(),
            'remitente' => Remitente::attributesToPrint(),
            'destinatario' => Destinatario::attributesToPrint(),
            'salida' => Salida::attributesToPrint(),
            'etapas' => Etapa::attributesToPrint(),
        ];
    }

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

    /*
    protected static function booted()
    {
        static::retrieved(function ($guia) {
            $guia->formato    = json_decode($guia->formato);
            $guia->margenes   = json_decode($guia->margenes);
            $guia->tipografia = json_decode($guia->tipografia);
            $guia->contenido  = json_decode($guia->contenido);
        });
    }
    */
}
