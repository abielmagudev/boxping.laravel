<?php

$settings = (object) [
    'is_link' => isset($is_link) && is_bool($is_link) ? $is_link : false,
    'classes' => isset($classes) && is_string($classes) ? $classes : null,
    'text' => isset($text) && is_string($text) ? $text : 'Modal Trigger',
    'modal' => "#{$modal}" ?? null,
    'data' => null,
];

if( isset($data) && is_array($data) )
{
    foreach($data as $key => $value)
    {
        if(! is_numeric($key) )
            $settings->data .= " data-{$key}=\"{$value}\" ";
    }
}

?>

@if( $settings->is_link )
    <a href="#!" data-bs-toggle="modal" data-bs-target="{{ $settings->modal }}" class="{{ $settings->classes }}" {!! $settings->data !!}>{!! $settings->text !!}</a>

@else
    <button type="button" data-bs-toggle="modal" data-bs-target="{{ $settings->modal }}" class="{{ $settings->classes }}" {!! $settings->data !!}>{!! $settings->text !!}</button>

@endif
