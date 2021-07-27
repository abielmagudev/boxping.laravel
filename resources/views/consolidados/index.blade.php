@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
    'title' => 'Consoliddos',
    'counter' => $consolidados->count(),
])
    @slot('options')
    <a href="{{ route('consolidados.create') }}" class="btn btn-sm btn-primary">
        <span class="d-block d-md-none fw-bold">+</span>
        <span class="d-none d-md-block">Nuevo consolidado</span>
    </a>
    @endslot
@endcomponent

@component('@.bootstrap.card')
    @slot('header')
    <div class="text-center small">
        <span class="badge rounded-pill" style="background-color:{{ $consolidado_color->abierto }}">
            {{ $consolidados->where('status', 'abierto')->count() }}
        </span>
        <span class="me-3 align-middle">Abierto</span>
        <span class="badge rounded-pill" style="background-color:{{ $consolidado_color->cerrado }}">
            {{ $consolidados->where('status', 'cerrado')->count() }}
        </span>
        <span class="align-middle">Cerrado</span>   
    </div>
    @endslot

    @slot('body')
    @component('@.bootstrap.table')
        @slot('thead', ['Status','Número','Cliente','Tarimas','Entradas'])
        @slot('tbody')
        @foreach($consolidados as $consolidado)
        <tr>
            <td class="text-center" style="width:1%">
                <span data-bs-title="{{ ucfirst($consolidado->status) }}" data-bs-toggle="tooltip" data-bs-placement="top" style="color:{{ $consolidado->status_color }}">
                    {!! $symbols->circle !!}
                </span>
            </td>
            <td class="min-width:288px">{{ $consolidado->numero }}</td>
            <td>{{ $consolidado->cliente_id ? "{$consolidado->cliente->nombre}" : '<small>Ninguno</small>' }}</td>
            <td>{{ $consolidado->tarimas }}</td>
            <td>{{ $consolidado->entradas->count() }}</td>
            <td class="text-nowrap text-end">
                <a href="{{ route('consolidados.show', $consolidado) }}" class="btn btn-sm btn-outline-primary">{!! $svg->eye !!}</a>
            </td>
        </tr>
        @endforeach
        @endslot    
    @endcomponent
    @endslot
@endcomponent
<br>

@include('@.bootstrap.pagination-simple', [
    'collection' => $consolidados
])
<br>

@endsection
