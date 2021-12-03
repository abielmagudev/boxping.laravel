<?php

namespace App\Ahex\Zowner\Application\Features;

trait HasValidations
{
    /** COLLECTIONs */

    public function hasAnyCollection($collection)
    {
        return $this->hasCollection($collection) ||
               $this->hasEloquentCollection($collection);
    }

    public function hasCollection($collection): bool
    {
        return $collection instanceof \Illuminate\Support\Collection;
    }

    public function hasEloquentCollection($collection)
    {
        return $collection instanceof \Illuminate\Database\Eloquent\Collection;
    }

    /** PAGINATIONs */
    
    public function hasAnyPagination($collection)
    {
        return  $this->hasPagination($collection) ||
                $this->hasSimplePagination($collection) ||
                $this->hasCursorPagination($collection);
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
}
