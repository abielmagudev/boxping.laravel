<?php

function getDataAttributes($data)
{
    $attributes = [];
    foreach($data as $key => $value)
    {
        if(! is_numeric($key) )
            array_push($attributes, "{$key}=\"{$value}\"") ;
    }

    return implode(' ', $attributes);
}

$settings = (object) [
    'classes' => isset($classes) && is_string($classes) ? $classes : null,
    'is_link' => isset($is_link) && is_bool($is_link) ? $is_link : false,
    'modal_id' => "#{$modal_id}" ?? '#modal-idless',
    'dataset' => isset($data) && is_array($data) ? getDataAttributes($data) : '',
    'text' => isset($text) && is_string($text) ? $text : 'Modal trigger',
];

?>

@if( $settings->is_link )
    <a href="#!" data-bs-toggle="modal" data-bs-target="{{ $settings->modal_id }}" class="{{ $settings->classes }}" {!! $settings->dataset !!}>{!! $settings->text !!}</a>

@else
    <button type="button" data-bs-toggle="modal" data-bs-target="{{ $settings->modal_id }}" class="{{ $settings->classes }}" {!! $settings->dataset !!}>{!! $settings->text !!}</button>

@endif
