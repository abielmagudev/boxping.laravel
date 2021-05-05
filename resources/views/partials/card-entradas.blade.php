<?php

// Defaults
$defaults = [
    'button_dropdown_sheets_id' => 'button_dropdown_sheets_id',
    'button_nueva_entrada_enable' => isset($button_nueva_entrada_enable) && is_bool($button_nueva_entrada_enable) ? $button_nueva_entrada_enable : true,
    'button_selectall_id'  => 'button_selectall_id',
    'checkbox_prefix_id'   => 'printing-checkbox-',
    'has_consolidado'      => isset($consolidado) && is_a($consolidado, 'App\Consolidado'),
    'has_entradas'         => isset($entradas) && is_a($entradas, 'Illuminate\Database\Eloquent\Collection'),
    'printing_enable'      => isset($printing_enable) && is_bool($printing_enable) ? $printing_enable : true,
    'printing_form_id'     => 'printing-form',
    'printing_sheets'      => array('etiqueta','etapas'),
    'route_printing'       => route('printing.entradas'),
];

// Validate by models
$validations = [
    'route_nueva_entrada' => $defaults['has_consolidado'] ? route('entradas.create', ['consolidado' => $consolidado]) : route('entradas.create'),
    'consolidado' => $defaults['has_consolidado'] ? $consolidado : false,
    'entradas' => $defaults['has_entradas'] ? $entradas : collect([]),
];

$card = (object) array_merge($defaults, $validations);

?>

@component('components.card')
    @slot('header_title', 'Entradas')
    @slot('header_title_badge', $card->entradas->count())

    @slot('header_options')
        @includeWhen($card->printing_enable, 'partials.card-entradas._buttons-printing')
        @if( $card->button_nueva_entrada_enable )
        <a href="{{ $card->route_nueva_entrada }}" class="btn btn-primary btn-sm">Nueva entrada</a>
        @endif
    @endslot

    @slot('body')
        @include('partials.card-entradas._table-entradas')
    @endslot
@endcomponent

@includeWhen($card->printing_enable, 'partials.card-entradas._js-printing-selectall')
