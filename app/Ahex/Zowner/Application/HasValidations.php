<?php

namespace App\Ahex\Zowner\Application;

trait HasValidations
{
    public function hasCollection($collection): bool
    {
        return is_a($collection, \Illuminate\Support\Collection::class) || 
               is_a($collection, \Illuminate\Database\Eloquent\Collection::class);
    }

    public function hasPagination($collection): bool
    {
        return $collection instanceof \Illuminate\Pagination\LengthAwarePaginator;
    }

    public function hasSimplePagination($collection): bool
    {
        return $collection instanceof \Illuminate\Pagination\Paginator;
    }

    public function hasCursorPagination($collection): bool
    {
        return $collection instanceof \Illuminate\Pagination\CursorPaginator;
    }

    public function hasAnyPagination($collection)
    {
        return  $this->hasPagination($collection) ||
                $this->hasSimplePagination($collection) ||
                $this->hasCursorPagination($collection);
    }
}
