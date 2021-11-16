<?php

namespace App\Ahex\Zowner\Infrastructure\Graffiti\Core;

trait Cache
{
    public function setCache($value)
    {
        return $this->cache = $value;
    }

    public function hasCache()
    {
        return (bool) $this->cache;
    }

    public function getCache()
    {
        return $this->cache;
    }

    public function modeCache(bool $active, $value)
    {
        if( ! $active )
            return $this->cleanCache();

        return $this->setCache($value);
    }

    public function cleanCache()
    {
        return $this->cache = null;
    }
}
