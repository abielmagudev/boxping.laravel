<?php

$has_entradas = isset($entradas) && is_a($entradas, \Illuminate\Database\Eloquent\Collection::class);

$settings = (object) [
    'consolidado' => isset($consolidado) && is_a($consolidado, \App\Consolidado::class) ? $consolidado : false,
    'hojas' => config('system.impresion.hojas'),
    'entradas' => (object) [
        'all' => $has_entradas ? $entradas : collect([]),
        'count' => isset($entradas_count) && is_int($entradas_count) ? $entradas_count : 0,
    ],
    'routes' => (object) [
        'nueva_entrada' => isset($route_nueva_entrada) && is_string($route_nueva_entrada) ? $route_nueva_entrada : false,
        'filtering' => isset($route_filtrado) && is_string($route_filtrado) ? $route_filtrado : false,
        'printing' => isset($route_impresion) && is_string($route_impresion) ? $route_impresion : route('printing.entradas'),
    ],
    'identifiers' => (object) [
        'button_dropdown_sheets' => 'button_dropdown_sheets',
        'button_select_all' => 'button_select_all',
        'checkbox_prefix_printing' => 'checkbox_prefix_printing',
        'form_printing' => 'form_printing',
    ],
];

?>

@component('components.card')
    @slot('header_title', 'Entradas')
    @slot('header_title_badge', $settings->entradas->count)

    @slot('header_options')
        @includeWhen($settings->routes->filtering, 'partials.card-entradas.modal-filter-entradas')
        @includeWhen($settings->routes->printing, 'partials.card-entradas.toolbar-printing')
        @if( $settings->routes->nueva_entrada )
        <a href="{{ $settings->routes->nueva_entrada }}" class="btn btn-outline-primary btn-sm">Nueva entrada</a>
        @endif
    @endslot

    @slot('body')
        @include('partials.card-entradas.table-entradas')
    @endslot
@endcomponent

@includeWhen($settings->routes->printing, 'partials.card-entradas.javascript-printing-select-all')
