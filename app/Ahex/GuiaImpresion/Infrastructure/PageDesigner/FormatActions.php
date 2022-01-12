<?php

namespace App\Ahex\GuiaImpresion\Infrastructure\PageDesigner;

trait FormatActions
{
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

    public function width($with_measure = true)
    {
        return $with_measure 
                ? $this->guide->formato->ancho . $this->guide->formato->medicion
                : $this->guide->formato->ancho;
    }

    public function height($with_measure = true)
    {
        return $with_measure 
                ? $this->guide->formato->alto . $this->guide->formato->medicion
                : $this->guide->formato->alto;
    }

    public function size()
    {
        $sides = array_filter([$this->width(), $this->height()], fn($side) => $side);
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
