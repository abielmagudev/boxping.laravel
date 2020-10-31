<?php

namespace App\Ahex\Suppliers\Styler;

Class Styler extends TransformText
{
    public function camel(string $string)
    {
        $capitalized = $this->capitalize($string);
        $words = $this->split($capitalized);
        $words[0] = $this->lower($words[0]);
        return implode('', $words);
    }

    public function pascal(string $string)
    {
        $capitalized = $this->capitalize($string);
        $words = $this->split($capitalized);
        return implode('', $words);
    }

    public function snake(string $string)
    {
        $lowers = $this->lower($string);
        $words = $this->split($lowers);
        return implode('_', $words);
    }

    public function kebab(string $string)
    {
        $lowers = $this->lower($string);
        $words = $this->split($lowers);
        return implode('-', $words);
    }

    public function custom(string $string, string $match = ' ', string $glue = '')
    {
        $words = $this->split($string, $match);
        return implode($glue, $words);
    }
}
