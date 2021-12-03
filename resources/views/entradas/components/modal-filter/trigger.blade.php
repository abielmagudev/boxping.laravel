<?php

$settings = (object) [
    'classes' => isset($classes) && is_string($classes) ? $classes : 'btn btn-primary',
    'text' => isset($text) && is_string($text) ? $text : 'Filtrar',
    'modal_id' => 'modalFiltrarEntradas',
];

?>
@include('@.bootstrap.modal-trigger', [
    'classes' => $settings->classes,
    'modal_id' => $settings->modal_id,
    'text' => $settings->text,
])    
