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
        $options = ['options' => ['min_range' => $min]];

        if(! $is_float )
            return (bool) filter_var($number, FILTER_VALIDATE_INT, $options);
            
        return (bool) filter_var($number, FILTER_VALIDATE_FLOAT, $options);
    }
}

if( ! function_exists('isMaxNumber') )
{
    function isMaxNumber($number, int $max, bool $is_float = false)
    {
        $options = ['options' => ['max_range' => $max]];

        if(! $is_float )
            return (bool) filter_var($number, FILTER_VALIDATE_INT, $options);
            
        return (bool) filter_var($number, FILTER_VALIDATE_FLOAT, $options);
    }
}

