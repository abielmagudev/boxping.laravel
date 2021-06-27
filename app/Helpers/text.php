<?php

if( ! function_exists('capitalize') )
{
    function capitalize($text)
    {
        return ucwords( strtolower($text) );
    }
}

if( ! function_exists('replaceSpecialChars') )
{
    function replaceSpecialChars($string)
    {
        $utf8 = [
            '/[áàâãªä]/u' => 'a',
            '/[ÁÀÂÃÄ]/u'  => 'A',
            '/[ÍÌÎÏ]/u'   => 'I',
            '/[íìîï]/u'   => 'i',
            '/[éèêë]/u'   => 'e',
            '/[ÉÈÊË]/u'   => 'E',
            '/[óòôõºö]/u' => 'o',
            '/[ÓÒÔÕÖ]/u'  => 'O',
            '/[úùûü]/u'   => 'u',
            '/[ÚÙÛÜ]/u'   => 'U',
            '/ç/'         => 'c',
            '/Ç/'         => 'C',
            '/ñ/'         => 'n',
            '/Ñ/'         => 'N',
            '/–/'         => '-', // UTF-8 hyphen to "normal" hyphen
            '/[’‘‹›‚]/u'  => '', // Literally a single quote
            '/[“”«»„]/u'  => '', // Double quote
            '/ /'         => '', // nonbreaking space (equiv. to 0x160)
        ];
    
        return  preg_replace( array_keys($utf8), array_values($utf8), $string);
    }
}

if( ! function_exists('highlightText') )
{
    function highlightText($search, $string, $classes = '')
    {
        return str_replace($search, "<mark class=\"p-0 {$classes}\">{$search}</mark>", $string);
    }
}

if( ! function_exists('hasSearchText') )
{
    function hasSearchText($search, $string)
    {
        return stripos($string, $search) !== false;
    }
}

if( ! function_exists('notHasSearchText') )
{
    function notHasSearchText($search, $string)
    {
        return stripos($string, $search) === false;
    }
}
