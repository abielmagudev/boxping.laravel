<?php

namespace App\Ahex\Entrada\Application\AfterStore;

abstract class Stored
{
    const REDIRECT_NOT_FOUND = false;
    protected $entrada;
    protected $redirects = [];

    public function __construct($entrada)
    {
        $this->entrada = $entrada;
    }

    public function __call($next, $arguments)
    {   
        if( ! $this->hasRedirect($next) )
            return self::REDIRECT_NOT_FOUND;

        return call_user_func([$this, $this->getRedirect($next)]);
    }

    public function hasRedirect($next)
    {
        return isset($this->redirects[$next]) && method_exists($this, $this->redirects[$next]);
    }

    public function getRedirect($next) 
    {
        return $this->redirects[$next];
    }
}
