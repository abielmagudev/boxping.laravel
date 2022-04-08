<?php

namespace App\Ahex\Entrada\Application\IndexCalled\Filtered;

use Carbon\Carbon;

class TiempoFiltered extends ZFiltered
{
    const OPTION_NO_EXISTS = null;

    public $inputs = [
        'from' => [
            'desde_fecha' => 'date',
            'desde_hora' => 'time',
        ],
        'to' => [
            'hasta_fecha' => 'date',
            'hasta_hora' => 'time',
        ],
    ];

    public $options = [
        'date' => [
            'format' => 'M, d Y',
            'regexp' => '/^[0-9]{4}(-[0-9]{2}){2}$/',
        ],
        'time' => [
            'format' => 'h:i:sA',
            'regexp' => '/^([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?$/', // http://w3.unpocodetodo.info/utiles/regex-ejemplos.php?type=hora
        ],
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

    public function config(string $name, string $option)
    {
        if(! isset($this->options[$name][$option]) )
            return self::OPTION_NO_EXISTS;

        return $this->options[$name][$option];
    }

    public function validate($value, string $config)
    {
        return preg_match($this->config($config, 'regexp'), $value);
    }

    public function carbon(string $value, string $config)
    {
        $carbon = new Carbon($value);
        return $carbon->format( $this->config($config, 'format') );
    }

    public function datetimeFrom()
    {
        foreach($this->inputs['from'] as $input => $rule)
        {
            if(! $this->validate($this->request->get($input), $rule) )
                continue;

            $datetime[] = $this->carbon($this->request->get($input), $rule);
        }

        return implode(' ', $datetime);
    }

    public function datetimeTo()
    {
        foreach($this->inputs['to'] as $input => $rule)
        {
            if(! $this->validate($this->request->get($input), $rule) )
                continue;

            $datetime[] = $this->carbon($this->request->get($input), $rule);
        }

        return implode(' ', $datetime);
    }
}
