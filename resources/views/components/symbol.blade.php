<?php

$symbols = array(
    'at' => '&#64;',
    'ballot-human-bold' => '&#10008;',
    'ballot-human' => '&#10007;',
    'ballot' => '&#10006;',
    'checkmark-human' => '&#10003;',
    'checkmark-square-white' => '&#9989;',
    'checkmark-square' => '&#9745;',
    'checkmark' => '&#10004;',
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
    'trade-mark' => '&#8482;',
    'wrongmark' => '&#65794;',
);

$settings = (object) array(
    'symbol' => isset($symbol) && array_key_exists($symbol, $symbols) ? $symbols[$symbol] : '?',
);

?>

<span class="font-weight-bold overflow-hidden"><?= $settings->symbol ?></span>
