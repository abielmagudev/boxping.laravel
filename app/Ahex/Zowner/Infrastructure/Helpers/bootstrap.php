<?php


if( ! function_exists('bootstrap_isInvalid') )
{
    function bootstrap_isInvalid($name, $errors)
    {
        return ! $errors->has($name) ?: 'is_invalid' ;
    }
}