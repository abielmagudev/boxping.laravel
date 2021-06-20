<?php 

/**
 * Set attribute "selected" in select field, if the values are equals
 * 
 * @return string "selected" or empty
 */
if( ! function_exists('toggleSelected') )
{
    function toggleSelected($value_a, $value_b, bool $strict = false)
    {
        return equals($value_a, $value_b, $strict) ? 'selected' : '';
    }
}

/**
 * Set attribute "checked" in checkbox or radio input, if the values are equals
 * 
 * @return string "checked" or empty
 */
if( ! function_exists('toggleChecked') )
{
    function toggleChecked($value_a, $value_b, bool $strict = false)
    {
        return equals($value_a, $value_b, $strict) ? 'checked' : '';
    }
}
