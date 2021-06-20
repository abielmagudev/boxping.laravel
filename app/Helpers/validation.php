<?php

if( ! function_exists('hasCollection') )
{
    function hasCollection($param): bool
    {
        return ($param instanceof \Illuminate\Support\Collection) || ($param instanceof \Illuminate\Database\Eloquent\Collection);
    }
}

if( ! function_exists('hasPagination') )
{
    function hasPagination($param): bool
    {
        return is_a($param, \Illuminate\Pagination\LengthAwarePaginator::class);
    }
}
