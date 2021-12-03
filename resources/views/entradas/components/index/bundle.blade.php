<?php

$settings = (object) [
    'with_options' => isset($options) && is_bool($options) ? $options : true,
    'with_checkbox' => isset($checkbox) && is_bool($checkbox) ? $checkbox : true,
    'with_dropdown' => isset($options) && is_bool($options) ? $options : true,
    'with_pagination' => isset($paginate) && is_bool($paginate) ? $paginate : true,
];

?>

@component('entradas.components.index.card', [
    'entradas' => $entradas,
    'counter' => $counter ?? false, 
])

@if( $settings->with_options )
    @slot('options')

    @if( $settings->with_checkbox )       
    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Seleccionar todo">
        <button class="btn active border-0 text-dark">
            {!! $graffiti->design('ui-checks')->svg() !!}
        </button>
    </span>
    @endif

    @includeWhen($settings->with_dropdown, 'entradas.components.index.dropdown')

    @endslot
@endif
    
@endcomponent

@if( $settings->with_pagination )
    @includeWhen($pagination->available, '@.bootstrap.pagination-simple', [
        'prev' => $pagination->prev,
        'next' => $pagination->next,
    ])
@endif


@if( $settings->with_options && $settings->with_dropdown )  
    @include('entradas.components.modal-filter.modal', [
        'route' => route('entradas.index'),
    ])
@endif



<!-- @ include('@.partials.guias-impresion-dropdown.multiple') -->
<!-- @ include('@.partials.checkboxes-checker.trigger') -->
<!-- @ include('@.partials.checkboxes-checker.scripts', ['checkbox_prefix' => 'checkboxEntrada']) -->
