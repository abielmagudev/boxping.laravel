<?php

$settings = (object) [
    'has_checkbox' => isset($checkbox) && is_bool($checkbox) ? $checkbox : true,
    'has_dropdown' => isset($dropdown) && is_array($dropdown) || $dropdown === true,
    'has_filtering' => isset($dropdown['except']) && is_array($dropdown['except']) &&! in_array('filtering', $dropdown['except']),
];

?>

@component('@.bootstrap.card', [
    'id' => 'lista-entradas',
    'title' => 'Entradas',
    'counter' => method_exists($entradas, 'total') ? $entradas->total() : $entradas->count(),
])

    @isset($center) 
    @slot('center'){!! $center !!}@endslot
    @endisset

    @slot('options')
    @includeWhen($settings->has_checkbox, '@.partials.checkboxes-toggle.trigger')
    @includeWhen($settings->has_dropdown, 'entradas.components.index.dropdown')
    @endslot

    @include('entradas.components.index.table', [
        'checkbox' => $settings->has_checkbox,
        'entradas' => method_exists($entradas, 'getCollection') ? $entradas->getCollection() : $entradas,
        'consolidado' => $consolidado ?? false,
        'destinatario' => $destinatario ?? false,
        'cliente' => $cliente ?? false,
    ])

@endcomponent
<br>

@includeWhen( isset($pagination), '@.bootstrap.pagination-simple', [
    'prev' => $pagination['prev'] ?? null,
    'next' => $pagination['next'] ?? null,
])

@includeWhen($settings->has_filtering, 'entradas.components.modal-filter.modal')

@includeWhen($settings->has_checkbox, '@.partials.checkboxes-toggle.script', [
    'checkbox_name' => 'entradas',    
])
