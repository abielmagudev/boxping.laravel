<?php

namespace App\Ahex\Zowner\Application;

trait HasValidations
{
    public function hasCollection($var): bool
    {
        return ($var instanceof \Illuminate\Support\Collection) || ($var instanceof \Illuminate\Database\Eloquent\Collection);
    }

    public function hasPagination($var): bool
    {
        return is_a($var, \Illuminate\Pagination\LengthAwarePaginator::class);
    }
}
