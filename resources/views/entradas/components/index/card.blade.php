<?php

$settings = (object) [
    'with_counter' => isset($with_counter) && is_bool($with_counter) ? $with_counter : true,
    'has_counter' => isset($counter) && is_int($counter),
    'has_center' => isset($center),
    'center' => $center ?? false,
    'has_options' => isset($options),
    'options' => $options ?? false,
];

?>

@component('@.bootstrap.card', [
    'title' => 'Entradas',
    'counter' => $settings->with_counter && $settings->has_counter ? $counter : null,
])

@if( $settings->has_center )
    @slot('center')
    {!! $settings->center !!}
    @endslot
@endif

@if( $settings->has_options )
    @slot('options')
    {!! $settings->options !!}
    @endslot
@endif

    @include('entradas.components.index.table')

@endcomponent
