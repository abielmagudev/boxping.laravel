<?php 

namespace App\Ahex\Zkeleton\Application;

Abstract class PropertySetter
{
    protected function set($prop, $value)
    {
        if( ! property_exists($this, $prop) )
            throw new \Exception("Property {$prop} not exists");

        $this->$prop = $value;
    }
}