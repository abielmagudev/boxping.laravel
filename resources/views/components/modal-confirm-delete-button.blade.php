<?php

$settings = (object) [
    'text' => isset($text) && is_string($text) ? $text : 'Eliminar',
];

?>

<button data-toggle="modal" data-target="#confirmDeleteModal" class="btn btn-link btn-sm text-danger p-0">{{ $settings->text }}</button>
