<?php

namespace App\Ahex\Zowner\Infrastructure\Graffiti;

use App\Ahex\Zowner\Infrastructure\Graffiti\Core\Cache;
use App\Ahex\Zowner\Infrastructure\Graffiti\Core\Canvas;
use App\Ahex\Zowner\Infrastructure\Graffiti\Core\Setup;

class Graffiti
{
    use Cache;
    use Canvas;
    use Setup;

    private $attributes;
    private $cache;
    private $stencil;
    private $stencils;
    
    public function __construct(string $book, string $stencils)
    {
        $this->stencils = call_user_func([$book, $stencils]);
        $this->cleanCache();
    }

    public function design(string $name, array $attributes = null)
    {
        if( ! $this->hasCache() )
            $this->setStencil($name)->setAttributes($attributes);

        return $this;
    }

    public function draw(string $canvas, bool $caching = false)
    {
        if( $this->hasCache() )
            return $this->getCache();
        
        $drawn = call_user_func([$this, $canvas]);

        $this->modeCache($caching, $drawn);

        return $drawn;
    }
}
