<?php

namespace App\Ahex\Zowner\Infrastructure\Graffiti\Core;

trait Setup
{
    public function setStencil(string $name)
    {
        $this->stencil = isset($this->stencils[$name]) 
                        ? $this->stencils[$name] 
                        : null;

        return $this;
    }

    public function getStencil()
    {
        return $this->stencil;
    }

    public function setAttributes($attributes)
    {
        $this->attributes = $attributes ?? [];

        return $this;
    }
    
    public function hasAttributes()
    {
        return (bool) is_array($this->attributes) && count($this->attributes);
    }

    public function hasAttribute($name)
    {
        return isset($this->attributes[$name]);
    }

    public function getAttribute($name, $default = null)
    {
        return $this->hasAttributes() && $this->hasAttribute($name)
                ? $this->attributes[$name]
                : $default;
    }
}
