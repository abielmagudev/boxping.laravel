<?php

$settings = (object) array(
    'text' => $text,
    'route' => $route,
    'content' => $content,
);

?>

@component('components.confirm-delete-button')
    @slot('text', $settings->text)
@endcomponent

@component('components.confirm-delete-modal')
    @slot('route', $settings->route)
    @slot('content', $settings->content)
@endcomponent
