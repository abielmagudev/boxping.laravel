@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
    'title' => 'Entradas',
    'counter' => $counter,
])
    @slot('options')
    <a href="{{ route('entradas.create') }}" class="btn btn-sm btn-primary">
        <span class="d-block d-md-none fw-bold">+</span>
        <span class="d-none d-md-block">Nueva entrada</span>
    </a>
    @endslot
@endcomponent

@component('@.bootstrap.card')
    @slot('header')
    <div class="text-end">
        @include('@.partials.entradas-filter.trigger')
        @include('@.partials.checkboxes-checker.trigger')
        @include('@.partials.sheets-printing-dropdown')
    </div>
    @endslot

    @slot('body')
    @include('@.partials.entradas-table', [
        'entradas' => $entradas,
        'checkboxes_form' => 'formEntradasPrinting',
    ]) 
    @endslot
@endcomponent
<br>

@includeWhen($has_pagination, '@.bootstrap.pagination-simple', [
    'prev' => $collection->previousPageUrl(),
    'next' => $collection->nextPageUrl(),
])

@include('@.partials.entradas-filter.modal', ['results_route' => route('entradas.index')])
@include('@.partials.checkboxes-checker.scripts', ['checkbox_prefix' => 'checkboxEntrada'])

@endsection
