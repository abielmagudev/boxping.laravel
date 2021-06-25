<?php

$checkbox_form = '';
$checkbox_prefix = 'checkbox-entrada-';
$checker_id = 'checker-entradas';

?>

@extends('app')
@section('content')

@component('@.bootstrap.page-header')
    @slot('title', $consolidado->numero)
    @slot('pretitle', 'Consolidado')
    @slot('options')
    <a href="{{ route('consolidados.edit', $consolidado) }}" class="btn btn-sm btn-warning">
        <span class="d-inline-block d-md-none">{!! $icons->pencil !!}</span>
        <span class="d-none d-md-inline-block">Editar</span>
    </a>
    <a href="{{ route('printing.consolidado', $consolidado) }}" class="btn btn-sm btn-primary">
        <span class="d-block d-md-none">{!! $svg->printer !!}</span>
        <span class="d-none d-md-block">Imprimir</span>
    </a>
    @endslot
@endcomponent

<div class="row">
    <!-- Column informacion -->
    <div class="col-sm">
        @component('@.bootstrap.card')
            @slot('header', 'Información')
            @slot('body')
                @component('@.bootstrap.table')
                    @slot('tbody')
                    <tr class="text-capitalize">
                        <td class="text-muted small" style="width:1%">Status</td>
                        <td class="fw-bold" style="color:{{ $config_consolidados->status[$consolidado->status]['color'] }}">{{ ucfirst($consolidado->status) }}</td>
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
                    @endslot
                @endcomponent
            @endslot
        @endcomponent
    </div>

    <!-- Column graficas -->
    <div class="col-sm"> 
        @component('@.bootstrap.card')
            @slot('header', 'Graficas')
            @slot('body')
            <p class="text-center">...</p>
            @endslot
        @endcomponent
    </div>
</div>
<br>

@component('@.bootstrap.card-headers')
    <!-- Slot headers  -->
    @slot('header_left')
    <span>Entradas</span>
    <span class="badge bg-dark text-white">{{ $consolidado->entradas->count() }}</span>
    @endslot

    @slot('header_right')

        @include('@.partials.entradas-filter.trigger')

        @include('@.partials.checkboxes-checker.trigger')

        @include('@.partials.sheets-printing-dropdown')

        @if( $consolidado->status === 'abierto' ) 
        <a href="{{ route('entradas.create', ['consolidado' => $consolidado->id]) }}" class="btn btn-sm btn-primary">
            <span class="d-block d-md-none fw-bold">+</span>
            <span class="d-none d-md-block">Nueva entrada</span>
        </a>
        @endif

    @endslot
    <!-- Endslot headers  -->
    
    <!-- Slot body  -->
    @slot('body')
        @include('@.partials.entradas-table', [   
            'entradas' => $entradas,
            'checkboxes_form' => 'form-entradas-printing',
            'numero_consolidado' => $consolidado->numero,
        ])
    @endslot
    <!-- Endslot body  -->

@endcomponent
<br>

@include('@.partials.checkboxes-checker.scripts', [
    'checkbox_prefix' => $checkbox_prefix,
    'checker_id' => $checker_id,
])

@include('@.partials.entradas-filter.modal', [
    'except' => ['ambitos', 'clientes','muestreos'],
    'header' => 'Filtros para entradas del consolidado',
    'results_route' => route('consolidados.show', [$consolidado]),
])

@endsection
