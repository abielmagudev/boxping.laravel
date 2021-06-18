<?php
$shapes = array(
    'circle' => '&#11044;',
    'circle-fisheye' => '&#9673;',
    'square' => '&#9607;',
    'square-fisheye' => '&#9635;',
    'triangle' => '&#9650;',
    'triangle-right' => '&#9654;',
    'triangle-down' => '&#9660;',
    'triangle-left' => '&#9664;',
    'triangle-right-corner' => '&#9698;',
);
$positions = array(
    'top',
    'right',
    'bottom',
    'left',
);
$settings = (object) [
    'title' => $title,
    'color' => isset($color) && is_string($color) ? $color : 'black',
    'shape' => isset($shape) && array_key_exists($shape, $shapes) ? $shapes[$shape] : $shapes['circle'],
    'position' => isset($position) && in_array($position, $positions) ? $position : 'top',
];
?>

<span style="color:{{ $settings->color }} !important;" data-toggle="tooltip" data-placement="{{ $settings->position }}" title="{{ $settings->title }}"><?= $settings->shape ?></span>