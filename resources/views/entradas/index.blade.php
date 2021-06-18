@extends('app')
@section('content')

@component('@.bootstrap.header', [
    'title' => 'Entradas',
    'counter' => $entradas->count(),
])
    @slot('options')
    <a href="{{ route('entradas.create') }}" class="btn btn-sm btn-primary">
        <span class="d-block d-md-none fw-bold">+</span>
        <span class="d-none d-md-block">Nueva entrada</span>
    </a>
    @endslot
@endcomponent

@component('@.bootstrap.card-headers')

    @slot('header_right')
    @component('@.partials.modal-filter-entradas', [
        'route_results' => route('entradas.index'),
        'header' => 'Filtros de entradas'
    ])
    @endcomponent

    <button class="btn btn-sm btn-primary" type="button" id="checker-entradas">
        {!! $svg->card_list !!}
    </button>

    @component('@.partials.dropdown-sheets-printing')
    @endcomponent

    @endslot

    @slot('body')
    @component('@.partials.table-entradas', [
        'entradas' => $has_pagination ? $entradas->getCollection() : $entradas,
        'checkbox_prefix' => 'checkbox-entrada-'
    ]) 
    @endcomponent
    @endslot

@endcomponent
<br>

@if( $has_pagination )
    @component('components.pagination-simple', [
        'collection' => $entradas,
    ])
    @endcomponent
@endif

@component('@.partials.script-toggle-checkboxes', [
    'checkbox_prefix' => 'checkbox-entrada-',
    'checker_id' => 'checker-entradas',
])

@endcomponent

<?php /*
@component('partials.card-entradas', [
    'entradas' => $has_pagination ? $entradas->getCollection() : $entradas,
    'entradas_count' => $has_pagination ? $entradas->total() : $entradas->count(),
    'route_nueva_entrada' => route('entradas.create'),
    'route_filtrado' => route('entradas.index'),
])    
@endcomponent
*/ ?>

@endsection
