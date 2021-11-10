@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Entradas',
    'counter' => $counter,
])
    @slot('options')
    <a href="{{ route('entradas.create') }}" class="btn btn-sm btn-primary">
        <span class="fw-bold">+</span>
    </a>
    @endslot

    @slot('header')
    <div class="text-end">
        <!-- @ include('@.partials.entradas-filter.trigger') -->
        <!-- @ include('@.partials.checkboxes-checker.trigger') -->
        <!-- @ include('@.partials.guias-impresion-dropdown.multiple') -->
    </div>
    @endslot

    @include('@.partials.table-entradas.content', [
        'entradas' => $entradas,
        'form_id' => 'formEntradasPrinting',
    ]) 
@endcomponent
<br>

@includeWhen($has_pagination, '@.bootstrap.pagination-simple', [
    'prev' => $collection->previousPageUrl(),
    'next' => $collection->nextPageUrl(),
])

<!-- @ include('@.partials.entradas-filter.modal', ['results_route' => route('entradas.index')]) -->
<!-- @ include('@.partials.checkboxes-checker.scripts', ['checkbox_prefix' => 'checkboxEntrada']) -->

@endsection
