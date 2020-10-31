<?php

namespace App\Ahex\Suppliers\Supplanter;

Abstract class Rules
{
    protected $rules;

    public function __construct()
    {
        $methods = get_class_methods(__CLASS__);
        unset($methods[0]); // Unset __construct method

        $this->rules = $methods;
    }

    public function marks(string $string)
    {
        $marks = ['á','é','í','ó','ú','ñ'];
        $unmarks = ['a','e','i','o','u','n'];
        return str_replace($marks, $unmarks, $string);
    }

    public function specials(string $string)
    {
        return preg_replace('/[^A-Za-z0-9\s]/', '', $string);
        // return preg_replace('/[^ \w]+/', '', $string);
    }
}
