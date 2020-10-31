<?php

namespace App\Ahex\Suppliers\Styler;

Abstract class TransformText
{
    public function lower(string $string)
    {
        return strtolower($string);
    }

    public function upper(string $string)
    {
        return strtoupper($string);
    }

    public function upperfirst(string $string)
    {
        return ucfirst( $this->lower($string) );
    }

    public function capitalize(string $string)
    {
        return ucwords( $this->lower($string) );
    }

    public function split(string $string, string $match = ' ')
    {
        $output = preg_replace('/\s+/', ' ', $string);
        return explode($match, $output);
    }
}
