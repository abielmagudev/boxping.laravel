<?php

namespace App\Ahex\Suppliers\Supplanter;

Class Supplanter extends Rules
{
    public function __construct(array $rules = [])
    {
        parent::__construct();

        if( count($rules) )
        {
            $this->validate($rules);
            $this->rules = array_intersect($this->rules, $rules);
        }
    }

    private function validate($rules)
    {
        foreach($rules as $rule)
        {
            if(! in_array($rule, $this->rules) )
                throw new \Exception(__CLASS__ . ": {$rule} rule not declared");
        }

        return;
    }

    public function do(string $string)
    {
        foreach($this->rules as $rule)
        {
            $string = call_user_func([$this, $rule], $string);
        }

        return $string;
    }
}
