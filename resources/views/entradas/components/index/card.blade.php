<?php

$efc = include resource_path('views/entradas/components/index/form_config.php');

$component = (object) [
    'counter' => method_exists($entradas, 'total') ? $entradas->total() : $entradas->count(),
    'entradas' => $entradas ?? collect([]),
    'filtered' => request()->filled('filter_token'),
];

?>

<a id="lista-entradas"></a>

<div class="row">
    <div class="col-sm">
    @component('@.bootstrap.card', [
        'title' => 'Entradas',
        'counter' => $component->counter,
    ])
        @slot('options')
        @include('entradas.components.index.card-options')
        @endslot

        @include('entradas.components.index.table', [
            'entradas' => $component->entradas,
        ])
    @endcomponent
    </div>

    @if( $component->filtered )   
    <div class="col-sm col-sm-3">
    @include('entradas.components.index.filtered')
    </div>
    @endif
</div>
<br>

@include('@.bootstrap.pagination-simple', [
    'collection' => $component->entradas
])
