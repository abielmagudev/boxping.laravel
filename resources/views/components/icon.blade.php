<?php

// Bootstrap icons
$icons_bs = [
    'pencil' => 'bi bi-pencil',
    'pencil-fill' => 'bi bi-pencil-fill',
    'pencil-square' => 'bi bi-pencil-square',
    'pen' => 'bi bi-pen',
    'pen-fill' => 'bi bi-pen-fill',
    'eye' => 'bi bi-eye',
    'eye-fill' => 'bi bi-eye-fill',
    'eye-not' => 'bi bi-eye-slash',
    'eye-not-fill' => 'bi bi-eye-slash-fill',
    'plus' => 'bi bi-plus',
    'plus-square' => 'bi bi-plus-square',
    'plus-square-fill' => 'bi bi-plus-square-fill',
    'plus-circle' => 'bi bi-plus-circle',
    'plis-circle-fill' => 'bi bi-plus-circle-fill',
];

$settings = (object) array(
    'icon' => isset($icon) && array_key_exists($icon, $icons_bs) ? $icons_bs[ $icon ] : '?',
    'size' => isset($size) ? $size : 'default',
    'classes' => isset($classes) && is_string($classes) ? $classes : '',
);

?>

<i class="{{ $settings->icon }} {{ $settings->classes }}"></i>
