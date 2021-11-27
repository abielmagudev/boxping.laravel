<?php

namespace App\Ahex\Zowner\Application;

trait HasValidations
{
    public function hasCollection($var): bool
    {
        return is_a($var, \Illuminate\Support\Collection::class) || 
               is_a($var, \Illuminate\Database\Eloquent\Collection::class);
    }

    public function hasPagination($var): bool
    {
        return $var instanceof \Illuminate\Pagination\LengthAwarePaginator;
    }

    public function hasSimplePagination($var): bool
    {
        return $var instanceof \Illuminate\Pagination\Paginator;
    }

    public function hasCursorPagination($var): bool
    {
        return $var instanceof \Illuminate\Pagination\CursorPaginator;
    }
}
