@extends('app')
@section('content')

@component('components.header')
    @slot('title', $consolidado->numero)
    @slot('subtitle', 'Consolidado')
    @slot('goback', route('consolidados.index'))

    @slot('options')
    <a href="{{ route('consolidados.edit', $consolidado) }}" class="btn btn-sm btn-warning">
        {!! $icons->pencil !!}
        <span class="d-none d-md-inline-block ms-1">Editar</span>
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
                @slot('classes', 'm-0')
                @slot('tbody')
                <tr class="text-capitalize">
                    <td class="text-muted small" style="width:1%">Status</td>
                    <td class="fw-bold" style="color:{{ $config_consolidados->status[$consolidado->status]['color'] }}">{{ ucfirst($consolidado->status) }}</td>
                </tr>
                <tr>
                    <td class="text-muted small">Cliente</td>
                    <td>{{ $consolidado->cliente->nombre }}</td>
                </tr>
                <tr>
                    <td class="text-muted small">Tarimas</td>
                    <td>{{ $consolidado->tarimas }}</td>
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
    @slot('header_badge', $consolidado->entradas->count())
    @slot('header_options')

    <a href="#printing" class="btn btn-sm btn-outline-primary">
        {!! $icons->printer !!}
    </a>

    @if( $consolidado->status == 'abierto' )
    <a href="{{ route('entradas.create', ['consolidado' => $consolidado]) }}" class="btn btn-sm btn-outline-primary">
        {!! $icons->plus !!}
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
