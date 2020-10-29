<?php

if(! function_exists('capitalize') )
{
    function capitalize($text)
    {
        return ucwords( strtolower($text) );
    }
}
