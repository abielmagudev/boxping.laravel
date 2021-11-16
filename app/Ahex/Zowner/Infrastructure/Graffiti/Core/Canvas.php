<?php

namespace App\Ahex\Zowner\Infrastructure\Graffiti\Core;

trait Canvas
{
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
