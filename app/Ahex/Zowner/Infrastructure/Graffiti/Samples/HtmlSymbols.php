<?php

namespace App\Ahex\Zowner\Infrastructure\Graffiti\Samples;

abstract class HtmlSymbols extends Book
{
    public static function codes()
    {
        return [
            'at' => '&#64;',
            'ballot-human-bold' => '&#10008;',
            'ballot-human' => '&#10007;',
            'ballot' => '&#10006;',
            'checkmark-human' => '&#10003;',
            'checkmark-square-white' => '&#9989;',
            'checkmark-square' => '&#9745;',
            'checkmark' => '&#10004;',
            'circle-fisheye' => '&#9673;',
            'circle' => '&#11044;',
            'clipboard' => '&#128203;',
            'close' => '&times;',
            'copyright' => '&#169;',
            'erase-left' => '&#9003;',
            'erase-right' => '&#8998;',
            'globe' => '&#127760;',
            'pencil-right' => '&#9998;',
            'pencil-up' => '&#10000;',
            'pencil' => '&#9999;',
            'print' => '&#9113;',
            'printer' => '&#128424;',
            'registered' => '&#174;',
            'square-fisheye' => '&#9635;',
            'square' => '&#9607;',
            'trade-mark' => '&#8482;',
            'triangle-down' => '&#9660;',
            'triangle-left' => '&#9664;',
            'triangle-right-corner' => '&#9698;',
            'triangle-right' => '&#9654;',
            'triangle' => '&#9650;',
            'wrongmark' => '&#65794;',
        ];
    }

    public static function names()
    {
        // 
    }
}
