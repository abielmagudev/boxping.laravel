<?php

if( ! function_exists('percentage') )
{
    function percentage($total, $count, $roundup = true)
    {
        $decimal = ( 0 . $count ) / $total;
        $percent = $decimal * 100;
        return $roundup ? ceil($percent) : floor($percent);
    }
}

if( ! function_exists('addition') )
{
    function addition($total, $add, $float = true)
    {
        $result = $total + $add;
        return $float ? round($result, 2) : round($result, 0, PHP_ROUND_HALF_UP);
    }
}

if( ! function_exists('subtraction') )
{
    function subtraction($total, $subtract, $float = true)
    {
        $result = $total - $subtract;
        return $float ? round($result, 2) : round($result, 0, PHP_ROUND_HALF_DOWN);
    }
}
