<?php

/**
 * Function to compare if the values ​​are equal
 * 
 * @return bool
 */

if(! function_exists('equals') )
{
    function equals($a, $b, bool $strict = false)
    {
        if( $strict )
            return $a === $b;
        
        return $a == $b;
    }
}