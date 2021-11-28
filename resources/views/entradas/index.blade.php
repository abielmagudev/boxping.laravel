@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Entradas',
    'counter' => $counter,
])
    @slot('options')
    <div class="dropdown">
        <button class="btn border-0 dropdown-toggle-arrowless" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">{!! $graffiti->design('three-dots-vertical')->draw('svg') !!}</button>
        <ul class="dropdown-menu border-0 shadow" aria-labelledby="dropdownMenuButton1">
            <li>
                <a href="{{ route('entradas.create') }}" class="dropdown-item">Nueva entrada</a>
            </li>
            <li>
                @include('entradas.modal-filter.trigger', [
                    'classes' => 'dropdown-item',
                    'text' => 'Filtrar entradas'
                ])
            </li>
            <li>
                <a class="dropdown-item disabled" href="#">Seleccionar / Deseleccionar todo</a>
            </li>
            <li>
                <a class="dropdown-item disabled" href="#">Imprimir seleccionadas</a>
            </li>
        </ul>
    </div>
    @endslot

    @include('entradas.table-index.render', [
        'entradas' => $entradas,
        'form_id' => 'formEntradasPrinting',
    ]) 
@endcomponent
<br>

@includeWhen($pagination->available, '@.bootstrap.pagination-simple', [
    'prev' => $pagination->prev,
    'next' => $pagination->next,
])

@include('entradas.modal-filter.modal', [
    'route' => route('entradas.index'),
])

<!-- @ include('@.partials.guias-impresion-dropdown.multiple') -->
<!-- @ include('@.partials.checkboxes-checker.trigger') -->
<!-- @ include('@.partials.checkboxes-checker.scripts', ['checkbox_prefix' => 'checkboxEntrada']) -->

@endsection
