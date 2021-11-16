<?php

namespace App\Ahex\Zowner\Infrastructure\Graffiti;

use App\Ahex\Zowner\Infrastructure\Graffiti\Core\CacheHandler;
use App\Ahex\Zowner\Infrastructure\Graffiti\Core\StencilHandler;

class Graffiti
{
    use StencilHandler;

    private $stencils;
    private $stencil;
    private $attributes;

    public function __construct(string $stencils_book, string $category)
    {
        $this->stencils = call_user_func([$stencils_book, $category]);
    }

    public function toDraw(string $name, array $attributes = null)
    {
        $this->setStencil($name)
             ->setAttributes($attributes);

        return $this;
    }

    public function svg()
    {
        return "
            <svg xmlns='http://www.w3.org/2000/svg'
                fill='currentColor' 
                viewBox='0 0 16 16'
                width='{$this->getAttribute('width', 16)}' 
                height='{$this->getAttribute('height', 16)}'
                class='{$this->getAttribute('class')}'
                style='{$this->getAttribute('style')}'
            >
                {$this->getStencil()}
            </svg>
        ";
    }

    public function icon()
    {
        return "
            <i class='{$this->getStencil()}' {$this->getAttribute('class')} style='{$this->getAttribute('style')}'></i>
        ";
    }
}
