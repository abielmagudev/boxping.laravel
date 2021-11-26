<?php

$settings = (object) [
    'text' => isset($text) && is_string($text) ? $text : 'Buscar destinatarios',
    'classes' => isset($classes) && is_string($classes) ? $classes : 'btn btn-primary',
];

?>
@include('@.bootstrap.modal-trigger', [
    'classes' => $settings->classes,
    'modal_id' => 'modalSearchDestinatarios',
    'text' => $settings->text,
])
