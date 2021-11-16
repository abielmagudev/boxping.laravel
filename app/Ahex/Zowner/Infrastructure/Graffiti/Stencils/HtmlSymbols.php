<?php

namespace App\Ahex\Zowner\Infrastructure\Graffiti\Stencils;

abstract class HtmlSymbols extends Book
{
    public static function codes()
    {
        return [
            'at' => '&#64;',
            'ballot_human_bold' => '&#10008;',
            'ballot_human' => '&#10007;',
            'ballot' => '&#10006;',
            'checkmark_human' => '&#10003;',
            'checkmark_square_white' => '&#9989;',
            'checkmark_square' => '&#9745;',
            'checkmark' => '&#10004;',
            'circle_fisheye' => '&#9673;',
            'circle' => '&#11044;',
            'clipboard' => '&#128203;',
            'close' => '&times;',
            'copyright' => '&#169;',
            'erase_left' => '&#9003;',
            'erase_right' => '&#8998;',
            'globe' => '&#127760;',
            'pencil_right' => '&#9998;',
            'pencil_up' => '&#10000;',
            'pencil' => '&#9999;',
            'print' => '&#9113;',
            'printer' => '&#128424;',
            'registered' => '&#174;',
            'square_fisheye' => '&#9635;',
            'square' => '&#9607;',
            'trade_mark' => '&#8482;',
            'triangle_down' => '&#9660;',
            'triangle_left' => '&#9664;',
            'triangle_right_corner' => '&#9698;',
            'triangle_right' => '&#9654;',
            'triangle' => '&#9650;',
            'wrongmark' => '&#65794;',
        ];
    }

    public static function names()
    {

    }
}
