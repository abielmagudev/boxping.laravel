<?php 

// Shortcuts of some functions of Laravel

/**
 * 
 * Function to get request method from helper request of Laravel
 * 
 * @return string
 * 
 */
if( ! function_exists('requestMethod') )
{
    function requestMethod()
    {
        $methods = request()->route()->methods();
        return array_shift( $methods );
    }
}
