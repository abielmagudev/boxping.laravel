@extends('app')
@section('content')

@component('components.header')
    @slot('title', $consolidado->numero)
    @slot('subtitle', 'Consolidado')
    @slot('goback', route('consolidados.index'))

    @slot('options')
    <div class="d-inline dropdown">
        <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="d-inline-block d-md-none">{!! $icons->printer_fill !!}</span>
            <span class="d-none d-md-inline-block">Imprimir</span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="{{ route('printing.consolidado',[$consolidado]) }}" target="_blank">Información</a></li>
            <li><a class="dropdown-item" href="{{ route('printing.consolidado',[$consolidado,'hoja' => 'entradas']) }}" target="_blank">Entradas</a></li>
            <li><a class="dropdown-item" href="{{ route('printing.consolidado',[$consolidado,'hoja' => 'etiquetas']) }}" target="_blank">Etiquetas</a></li>
            <li><a class="dropdown-item" href="{{ route('printing.consolidado',[$consolidado,'hoja' => 'etapas']) }}" target="_blank">Etapas</a></li>
        </ul>
    </div>
    <a href="{{ route('consolidados.edit', $consolidado) }}" class="btn btn-sm btn-warning">
        <span class="d-inline-block d-md-none">{!! $icons->pencil !!}</span>
        <span class="d-none d-md-inline-block">Editar</span>
    </a>
    @endslot
@endcomponent

<div class="row">
    <div class="col-sm">
        @component('components.card')
            @slot('classes', 'h-100')
            @slot('body')
            <p class="small text-muted">Información</p>
            @component('components.table')
                @slot('hover', false)
                @slot('classes', 'm-0')
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
                    <td class="text-muted small border-0">Tarimas</td>
                    <td class="border-0">{{ $consolidado->tarimas }}</td>
                </tr>
                @endslot
            @endcomponent
            @endslot
        @endcomponent
    </div>
    <div class="col-sm"> 
        @component('components.card')
            @slot('classes', 'h-100')
            @slot('body')
            <p class="text-muted small">Notas</p>
            <div class="lead m-0">{{ $consolidado->notas }}</div>
            @endslot
        @endcomponent
    </div>
</div>
<br>

@component('components.card')
    @slot('header_title', 'Entradas')
    @slot('header_title_badge', $consolidado->entradas->count())
    
    @slot('header_options')
    @if( $consolidado->status == 'abierto' )
    <a href="{{ route('entradas.create', ['consolidado' => $consolidado]) }}" class="btn btn-sm btn-primary">
        <span class="d-inline-block d-md-none me-1">{!! $icons->printer_fill !!}</span>
        <span class="d-none d-md-inline-block me-1">Agregar</span>
    </a>
    @endif
    @endslot

    @slot('body')
    @if( $consolidado->entradas->count() )
    @component('partials.table-summary-entradas', [
        'entradas' => $consolidado->entradas->sortByDesc('id')
    ])
    @endcomponent
    @endif 
    @endslot

@endcomponent
@endsection
