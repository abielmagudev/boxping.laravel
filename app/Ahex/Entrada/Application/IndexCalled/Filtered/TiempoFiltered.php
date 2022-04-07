<?php

namespace App\Ahex\Entrada\Application\IndexCalled\Filtered;

use Carbon\Carbon;

class TiempoFiltered extends ZFiltered
{    
    public $patterns = [
        'date' => '/[0-9]{4}.-.[0-9]{2}.-.[0-9]{2}/',
        'time' => '/[0-9]{2}.:.[0-9{2}].:.[0-9]{2}/',
    ];

    public $formats = [
        'date' => 'M, d Y',
        'time' => 'h:i:s A',
    ];

    public $times = [
        'actualizado',
        'confirmado',
        'creado',
        'importado',
        'reempacado',
    ];

    public function title(): string
    {
        return $this->exists($this->request->tiempo) ? ucfirst($this->request->tiempo) : 'Tiempo?...';
    }

    public function content(): string
    {
        if(! $this->exists($this->request->tiempo) )
            return 'Cualquier fecha y hora';

        return "{$this->datetimeFrom()} <br> {$this->datetimeTo()}";
    }

    public function exists(string $time = null)
    {
        return in_array($time, $this->times);
    }

    public function pattern(string $type)
    {
        return $this->patterns[$type];
    }

    public function format(string $type)
    {
        return $this->formats[$type];
    }

    public function validate(string $value = '', string $type)
    {
        return is_int( preg_match($this->pattern($type), $value) );
    }

    public function carbon(string $value, string $type)
    {
        $carbon = new Carbon($value);
        return $carbon->format( $this->format($type) );
        // dd($carbon->format('M, d Y h:i:s A'));
    }

    public function datetimeFrom()
    {
        $datetime = '';

        if( $this->validate($this->request->desde_fecha, 'date') )
            return $datetime = $this->carbon($this->request->desde_fecha, 'date');

        if( $this->validate($this->request->desde_hora, 'time') )
            return $datetime .= ' ' . $this->carbon($this->request->desde_hora, 'time');

        return $datetime;
    }

    public function datetimeTo()
    {
        $datetime = '';

        if( $this->validate($this->request->hasta_fecha, 'date') )
            return $datetime = $this->carbon($this->request->hasta_fecha, 'date');

        if( $this->validate($this->request->hasta_hora, 'time') )
            return $datetime .= ' ' . $this->carbon($this->request->hasta_hora, 'time');

        return $datetime;
    }
}
