<?php

$getDataAttributes = function ($data)
{
    $attributes = [];
    foreach($data as $key => $value)
    {
        if(! is_numeric($key) )
            array_push($attributes, "{$key}=\"{$value}\"") ;
    }

    return implode(' ', $attributes);
};

$settings = (object) [
    'classes' => isset($classes) && is_string($classes) ? $classes : null,
    'dataset' => isset($data) && is_array($data) ? $getDataAttributes($data) : '',
    'is_link' => isset($is_link) && is_bool($is_link) ? $is_link : false,
    'modal_id' => isset($modal_id) && is_string($modal_id) ? "#{$modal_id}" : '#modalIdless',
    'text' => isset($text) ? $text : 'Modal trigger',
];

?>

@if( $settings->is_link )
    <a href="#!" data-bs-toggle="modal" data-bs-target="{{ $settings->modal_id }}" class="{{ $settings->classes }}" {!! $settings->dataset !!}>{!! $settings->text !!}</a>

@else
    <button type="button" data-bs-toggle="modal" data-bs-target="{{ $settings->modal_id }}" class="{{ $settings->classes }}" {!! $settings->dataset !!}>{!! $settings->text !!}</button>

@endif
