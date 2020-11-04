<?php

$symbols = array(
    'ballot-human-bold' => '&#10008;',
    'ballot-human' => '&#10007;',
    'ballot' => '&#10006;',
    'checkmark-human' => '&#10003;',
    'checkmark-square-white' => '&#9989;',
    'checkmark-square' => '&#9745;',
    'checkmark' => '&#10004;',
    'clipboard' => '&#128203;',
    'close' => '&times;',
    'erase-left' => '&#9003;',
    'erase-right' => '&#8998;',
    'pencil-right' => '&#9998;',
    'pencil-up' => '&#10000;',
    'pencil' => '&#9999;',
    'print' => '&#9113;',
    'printer' => '&#128424;',
    'wrongmark' => '&#65794;',
);

$settings = (object) array(
    'symbol' => isset($symbol) && array_key_exists($symbol, $symbols) ? $symbols[$symbol] : '?',
);

?>

<span class="font-weight-bold overflow-hidden"><?= $settings->symbol ?></span>
