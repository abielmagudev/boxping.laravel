<?php 

$all_entradas_filters = [
    'numero',
    'ambitos',
    'clientes',
    'salidas',
    'etapas',
    'tiempos',
    'muestreos',
];

$filter_settings = (object) [
    'filters' => isset($filter['except']) && is_array($filter['except']) ? array_diff($all_entradas_filters, $filter['except']) : $all_entradas_filters,
    'route' => isset($filter['route']) && is_string($filter['route']) ? $filter['route'] : route('entradas.index'),
    'hook' => $filter_hook ?? null,
];

?>

@component('@.bootstrap.modal', [
    'id' => 'modalFiltrarEntradas',
    'title' => 'Filtrar entradas',
    'header_close' => true,
])
    <form action="{{ $filter_settings->route }}" method="get" id="formFiltersEntradas" autocomplete="off">
        @foreach($filter_settings->filters as $filter)
            @include("entradas.components.modal-filter.filters.{$filter}")
        @endforeach
        <hr>

        {!! $filter_settings->hook !!}

        <input type="hidden" name="filter_token" value="<?= csrf_token() ?>">
        <div class="text-end">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" form="formFiltersEntradas">Filtrar entradas</button>
        </div>
    </form>
@endcomponent
