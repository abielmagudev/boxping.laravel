<?php

$settings = (object) [
    'classes' => isset($classes) && is_string($classes) ? $classes : 'btn btn-primary',
    'text' => isset($text) && is_string($text) ? $text : 'Filtrar',
];

?>

@include('@.bootstrap.modal-trigger', [
    'classes' => $settings->classes,
    'modal_id' => 'modalFiltrarEntradas',
    'text' => $settings->text,
])    
