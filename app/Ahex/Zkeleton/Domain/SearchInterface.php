<?php 

namespace App\Ahex\Zkeleton\Domain;

Interface SearchInterface
{
    public function scopeSearch($query, $value);
}