<?php

namespace App\Ahex\Zowner\Infrastructure\Graffiti\Core;

trait CacheHandler
{
    public function cache(bool $flag)
    {
        $this->setCache('mode', $flag);
        return $this;
    }

    public function modeCache()
    {
        return $this->getCache('mode') ?? false;
    }

    public function hasCache(string $key)
    {
        return (bool) $this->getCache($key);
    }

    public function setCache(string $key, $value)
    {
        return $this->cache[$key] = $value;
    }

    public function getCache(string $key)
    {
        return $this->cache[$key] ?? null;
    }
}
