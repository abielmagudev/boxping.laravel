<?php 

namespace App\Ahex\Suppliers\Slugger;

use App\Ahex\Suppliers\Supplanter\Supplanter;
use App\Ahex\Suppliers\Styler\Styler;

Class Slugger
{
    private $supplanter;
    private $styler;

    public function __construct(array $rules = [])
    {
        $this->supplanter = new Supplanter($rules);
        $this->styler = new Styler;
    }

    public function __call($method, $arguments)
    {
        if(! method_exists($this->styler, $method) )
            throw new \Exception("Method {$method} not declared");

        $arguments[0] = $this->supplanter->do($arguments[0]);
        return call_user_func([$this->styler, $method], ...$arguments);
    }
}

// https://github.com/cocur/slugify
