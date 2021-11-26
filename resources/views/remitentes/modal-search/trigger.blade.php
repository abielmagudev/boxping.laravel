<?php

$settings = (object) [
    'text' => isset($text) && is_string($text) ? $text : 'Buscar remitentes',
    'classes' => isset($classes) && is_string($classes) ? $classes : 'btn btn-primary',
];

?>
@include('@.bootstrap.modal-trigger', [
    'classes' => $settings->classes,
    'modal_id' => 'modalSearchRemitentes',
    'text' => $settings->text,
])
