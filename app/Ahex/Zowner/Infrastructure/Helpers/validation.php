<?php

/**
 * Function to compare if the values ​​are equal
 * 
 * @return bool
 */
if( ! function_exists('equals') )
{
    function equals($a, $b, bool $strict = false)
    {
        if( $strict )
            return $a === $b;
        
        return $a == $b;
    }
}

if( ! function_exists('isMinNumber') )
{
    function isMinNumber($number, int $min, bool $is_float = false)
    {
        if(! $is_float )
            return (bool) filter_var($number, FILTER_VALIDATE_INT, ['options' => ['mmin_range' => $min]]);
            
        return (bool) is_float($number) && $number >= $min;
    }
}

if( ! function_exists('isMaxNumber') )
{
    function isMaxNumber($number, int $max, bool $is_float = false)
    {
        if(! $is_float )
            return (bool) filter_var($number, FILTER_VALIDATE_INT, ['options' => ['max_range' => $max]]);
            
        return (bool) is_float($number) && $number <= $max;
    }
}

