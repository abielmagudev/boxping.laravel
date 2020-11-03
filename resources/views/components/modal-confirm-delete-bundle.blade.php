<?php

$settings = (object) array(
    'text' => $text,
    'route' => $route,
    'content' => $content,
);

?>

@component('components.modal-confirm-delete-button')
    @slot('text', $settings->text)
@endcomponent

@component('components.modal-confirm-delete-content')
    @slot('route', $settings->route)
    @slot('content', $settings->content)
@endcomponent
