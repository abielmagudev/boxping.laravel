@extends('app')
@section('content')

<?php

$checkbox_form = '';
$checkbox_prefix = 'checkboxEntrada';
$checker_id = 'checker-entradas';

?>

@include('@.bootstrap.page-header', [
    'title' => $consolidado->numero,
    'pretitle' => 'Consolidado',
])

<p class="text-end">
    <a href="{{ route('consolidados.print', $consolidado) }}" class="btn btn-sm btn-primary">
        {!! $graffiti->design('printer-fill')->svg() !!}
    </a>
</p>

<div class="row">
    <!-- Column informacion -->
    <div class="col-sm">
        @component('@.bootstrap.card', [
            'title' => 'Información'    
        ])
            @component('@.bootstrap.table')
                <tr class="text-capitalize">
                    <td class="text-muted small" style="width:1%">Status</td>
                    <td class="text-uppercase">
                        <span class="badge <?= $consolidado->status == 'abierto' ? 'text-dark' : 'text-white' ?>" style="background-color:<?= $consolidado->status_color ?>">{{ $consolidado->status }}</span>
                    </td>
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
            @include('@.bootstrap.progress-bar', [
                'color' => 'bg-primary', 
                'text' => 'Confirmados', 
                'label' => subtraction($entradas->count(), $entradas->whereNull('confirmado_at')->count()),
                'value' => percentage($entradas->count(), $entradas->whereNotNull('confirmado_at')->count()), 
            ])

            @include('@.bootstrap.progress-bar', [
                'color' => 'bg-primary', 
                'text' => 'Importados', 
                'label' => subtraction($entradas->count(), $entradas->whereNull('importado_fecha')->count()), 
                'value' => percentage($entradas->count(), $entradas->whereNotNull('importado_fecha')->count()), 
            ])

            @include('@.bootstrap.progress-bar', [
                'color' => 'bg-primary', 
                'text' => 'Reempacados', 
                'label' => subtraction($entradas->count(), $entradas->whereNull('codigor_id')->count()), 
                'value' => percentage($entradas->count(), $entradas->whereNotNull('codigor_id')->count()), 
            ])
                
            @include('@.bootstrap.progress-bar', [
                'color' => 'bg-primary', 
                'text' => 'Destinados', 
                'label' => subtraction($entradas->count(), $entradas->whereNull('destinatario_id')->count()), 
                'value' => percentage($entradas->count(), $entradas->whereNotNull('destinatario_id')->count()), 
            ])
        @endcomponent
    </div>
</div>
<br>

@component('@.bootstrap.card', [
    'title' => 'Entradas',
    'counter' => $entradas->count()
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
    @include('entradas.components.index.table', [   
        'entradas' => $entradas,
        'form_id' => 'formEntradasPrinting',
        'consolidado' => $consolidado,
        'cliente' => $consolidado->cliente,
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
