<?php

namespace App\Ahex\Entrada\Application\AfterStore;

use App\Entrada;

abstract class Steps
{
    const STEP_NOT_FOUND = false;
    protected $steps = [];
    protected $model;

    public function __construct(Entrada $entrada)
    {
        $this->model = $entrada;
    }

    public function __call($step, $params = null)
    {
        if( ! $this->has($step) )
            return self::STEP_NOT_FOUND;

        return call_user_func([$this, $this->step($step)]);
    }

    public function has($step)
    {
        return isset($this->steps[$step]);
    }

    public function step($name) 
    {
        return $this->steps[$name];
    }
}
