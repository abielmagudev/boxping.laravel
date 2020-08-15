<?php 

/**
 * Set attribute "selected" in select field, if the values are equals
 * 
 * @return string "selected" or empty
 */
if(! function_exists('selectable') )
{
    function selectable($constant, $variable, bool $strict = false)
    {
        return equals($constant, $variable, $strict) ? 'selected' : '';
    }
}

/**
 * Set attribute "checked" in checkbox or radio input, if the values are equals
 * 
 * @return string "checked" or empty
 */
if(! function_exists('checkable') )
{
    function checkable($constant, $variable, bool $strict = false)
    {
        return equals($constant, $variable, $strict) ? 'checked' : '';
    }
}