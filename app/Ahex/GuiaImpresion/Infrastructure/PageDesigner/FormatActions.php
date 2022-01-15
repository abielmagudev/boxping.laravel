<?php

namespace App\Ahex\GuiaImpresion\Infrastructure\PageDesigner;

trait FormatActions
{
    public static function allMeasurements(string $glue = null)
    {
        if(! self::hasCache('measurements') )
            self::setCache('measurements', config('system.mediciones.longitud'));
        
        return isset($glue) ? implode($glue, array_keys(self::cache('measurements'))) : self::cache('measurements');
    }

    public static function defaultMeasurement()
    {
        return array_key_first( self::allMeasurements() );
    }

    public static function existsMeasurement(string $abbr)
    {
        return isset( self::allMeasurements()[$abbr] );
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
