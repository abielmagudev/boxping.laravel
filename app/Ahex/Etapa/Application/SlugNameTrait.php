<?php 

namespace App\Ahex\Etapa\Application;

Trait SlugNameTrait
{
    private static function slugName($name)
    {
        return strtolower( str_replace(' ', '-', $name) );
    }
}
