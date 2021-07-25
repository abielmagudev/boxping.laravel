<?php $except_filters = isset($except) && is_array($except) ? $except : [] ?>

@component('@.bootstrap.modal', [
    'id' => 'modalEntradasFilter',
    'title' => 'Filtros de entradas',
    'header_close' => true,
])
    @slot('body')
    <!-- Inicio del formulario para filtrar entradas -->
    <form action="{{ $results_route }}" method="get" id="formFiltersEntradas">
        @includeUnless(in_array('ambitos', $except_filters), '@.partials.entradas-filter.form-filters.ambitos')
        @includeUnless(in_array('clientes', $except_filters), '@.partials.entradas-filter.form-filters.clientes')
        @includeUnless(in_array('etapas', $except_filters), '@.partials.entradas-filter.form-filters.etapas')
        @includeUnless(in_array('fechas-horas', $except_filters), '@.partials.entradas-filter.form-filters.fechas-horas')
        @include('@.partials.entradas-filter.form-filters.muestreos')
        <hr class="">
        <div class="text-end">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success" form="formFiltersEntradas" name="filter" value="{{ csrf_token() }}">Filtrar entradas</button>
        </div>
    </form>
    <!-- Fin del formulario para filtrar entradas -->
    @endslot
@endcomponent
