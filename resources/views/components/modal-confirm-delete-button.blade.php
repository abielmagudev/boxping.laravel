<?php

$settings = (object) [
    'text' => isset($text) && is_string($text) ? $text : 'Eliminar',
    'small' => isset($small) && is_bool($small) ? $small : false,
];

?>

<button data-toggle="modal" data-target="#confirmDeleteModal" class="btn btn-link {{ $settings->small ? 'btn-sm' : '' }} text-danger p-0">{{ $settings->text }}</button>
