<?php 

$entradas_filters = [
    'ambitos',
    'clientes',
    'etapas',
    'tiempos',
    'muestreos',
];

$settings = (object) [
    'filters' => isset($except) && is_array($except) ? array_diff($entradas_filters, $settings->except) : $entradas_filters,
    'route' => $route,
];

?>

@component('@.bootstrap.modal', [
    'id' => 'modalFiltrarEntradas',
    'title' => 'Filtrar entradas',
    'header_close' => true,
])
    <!-- Inicio del formulario para filtrar entradas -->
    <form action="{{ $settings->route }}" method="get" id="formFiltersEntradas">
        @foreach($settings->filters as $filter)
            @include("entradas.components.modal-filter.filters.{$filter}")
        @endforeach
        <hr>
        
        <input type="hidden" name="token" value="<?= csrf_token() ?>">
        <div class="text-end">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success" form="formFiltersEntradas">Filtrar entradas</button>
        </div>
    </form>
    <!-- Fin del formulario para filtrar entradas -->
@endcomponent
