@extends('app')
@section('content')

<?php

$checkbox_form = '';
$checkbox_prefix = 'checkboxEntrada';
$checker_id = 'checker-entradas';

?>

@component('@.bootstrap.page-header', [
    'title' => $consolidado->numero,
    'pretitle' => 'Consolidado',
])
    @slot('options')
    <a href="{{ route('consolidados.edit', $consolidado) }}" class="btn btn-sm btn-warning">
        @include('@.bootstrap.icon', ['icon' => 'edit'])
    </a>
    @endslot
@endcomponent

<div class="row">
    <!-- Column informacion -->
    <div class="col-sm">
        @component('@.bootstrap.card', [
            'title' => 'Información'    
        ])
            @slot('options')
            <a href="{{ route('consolidados.printing', $consolidado) }}" class="btn btn-sm btn-primary">
                <span class="">Imprimir</span>
            </a>
            @endslot

            @component('@.bootstrap.table')
                <tr class="text-capitalize">
                    <td class="text-muted small" style="width:1%">Status</td>
                    <td class="fw-bold" style="color:<?= $consolidado->status_color ?>">{{ ucfirst($consolidado->status) }}</td>
                </tr>
                <tr>
                    <td class="text-muted small">Cliente</td>
                    <td>{{ $consolidado->cliente_id ? "{$consolidado->cliente->nombre} ({$consolidado->cliente->alias})" : 'Ninguno' }}</td>
                </tr>
                <tr class="">
                    <td class="text-muted small">Tarimas</td>
                    <td>{{ $consolidado->tarimas }}</td>
                </tr>
                <tr class="border-0">
                    <td class="text-muted small border-0">Notas</td>
                    <td class="border-0">{{ $consolidado->notas }}</td>
                </tr>
            @endcomponent
        @endcomponent
    </div>

    <!-- Column graficas -->
    <div class="col-sm"> 
        @component('@.bootstrap.card', [
            'title' => 'Gráficas',    
        ])
        <p class="text-center">...</p>
        @endcomponent
    </div>
</div>
<br>

@component('@.bootstrap.card', [
    'title' => 'Entradas',
    'counter' => $consolidado->entradas->count()
])
    <!-- Slot options  -->
    @slot('options')
    <!-- @ include('@.partials.entradas-filter.trigger') -->
    <!-- @ include('@.partials.checkboxes-checker.trigger') -->
    <!-- @ include('@.partials.guias-impresion-dropdown.multiple') -->

    @if( $consolidado->status === 'abierto' ) 
    <a href="{{ route('entradas.create', ['consolidado' => $consolidado->id]) }}" class="btn btn-sm btn-primary">
        <span class="fw-bold">+</span>
    </a>
    @endif
    @endslot
    <!-- Endslot options  -->
    
    <!-- Slot body  -->
    @include('@.partials.table-entradas.content', [   
        'entradas' => $entradas,
        'form_id' => 'formEntradasPrinting',
        'consolidado' => $consolidado,
    ])
    <!-- Endslot body  -->

@endcomponent
<br>

<!-- @ include('@.partials.checkboxes-checker.scripts', [
    'checkbox_prefix' => $checkbox_prefix,
    'checker_id' => $checker_id,
]) -->

<!-- @ include('@.partials.entradas-filter.modal', [
    'except' => ['ambitos', 'clientes','muestreos'],
    'header' => 'Filtros para entradas del consolidado',
    'results_route' => route('consolidados.show', [$consolidado]),
]) -->

@endsection
