<?php

namespace App\Ahex\GuiaImpresion\Infrastructure\PageDesigner;

trait FormatActions
{
    public static $margin_sides = [
        'arriba' => 'top',
        'derecha' => 'right',
        'abajo' => 'bottom',
        'izquierda' => 'left',
    ];

    public static function allMeasurements()
    {
        if( self::hasCache('measurements') )
            return self::cache('measurements');
        
        return self::setCache('measurements', config('system.mediciones.longitud'));
    }

    public static function defaultMeasurement()
    {
        return array_key_first( self::allMeasurements() );
    }

    public static function existsMeasurement(string $abbr)
    {
        return isset( self::allMeasurements()[$abbr] );
    }

    public static function implodeMeasurements(string $glue = ',')
    {
        return implode($glue, array_keys(self::allMeasurements()));
    }

    public function size()
    {
        $self = $this;

        $sides = array_filter(['ancho','alto'], function ($side) use ($self) {
            if( isset($self->guide->$side) )
                return $self->guide->formato->$side . $self->guide->formato->medicion;
        });
        
        return implode(' ', $sides);
    }

    public function margins()
    {
        $self = $this;

        $margins = array_map( function ($side) use ($self) {

            return isset( $self->guide->margenes->$side ) 
                    ? $self->guide->margenes->$side . $self->guide->margenes->medicion
                    : 'auto';

        }, ['arriba','derecha','abajo','izquierda']);

        return implode(' ', $margins);
    }
}
