@extends('app')
@section('content')

@component('components.header')
    @slot('title', $consolidado->numero)
    @slot('subtitle', 'Consolidado')
    @slot('options')
    <a href="{{ route('printing.consolidado', $consolidado) }}" class="btn btn-sm btn-outline-primary">
        <span class="">Imprimir</span>
    </a>
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

@component('partials.card-entradas', [
    'button_nueva_entrada_enable' => $consolidado->status === 'abierto',
    'consolidado' => $consolidado,
    'entradas' => $consolidado->entradas->load('cliente'),
])    
@endcomponent

@endsection
