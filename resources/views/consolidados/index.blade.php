@extends('app')
@section('content')

@component('components.card')
    @slot('header_title', 'Consolidados')
    @slot('header_badge', $consolidados->count())
    @slot('header_options')
    <a href="{{ route('consolidados.create') }}" class="btn btn-sm btn-outline-primary">Nuevo consolidado</a>
    @endslot
    @slot('body')
    
    @component('components.wrapper')
        @slot('background_color', 'light')
        @slot('body')
        <div class="text-center">
            <span class="badge rounded-pill" style="background-color:{{ $config_consolidados->status['abierto']['color'] }}">
                {{ $consolidados->where('status', 'abierto')->count() }}
            </span>
            <span class="me-3 align-middle">Abierto</span>
            <span class="badge rounded-pill" style="background-color:{{ $config_consolidados->status['cerrado']['color'] }}">
                {{ $consolidados->where('status', 'cerrado')->count() }}
            </span>
            <span class="align-middle">Cerrado</span>   
        </div>
        @endslot
    @endcomponent
    <br>

    @component('components.table')
        @slot('size', 'small')
        @slot('thead', ['Status','Número','Cliente','Tarimas','Entradas',''])
        @slot('tbody')
        @foreach($consolidados as $consolidado)
        <tr>
            <td class="text-center" style="width:1%">
                <?php $color = $config_consolidados->status[$consolidado->status]['color'] ?>
                <span data-bs-title="{{ ucfirst($consolidado->status) }}" data-bs-toggle="tooltip" data-bs-placement="top" style="color:{{ $color }}">
                    {!! $symbols->circle !!}
                </span>
            </td>
            <td class="min-width:288px">{{ $consolidado->numero }}</td>
            <td>{{ $consolidado->cliente->nombre }}</td>
            <td>{{ $consolidado->tarimas }}</td>
            <td>{{ $consolidado->entradas->count() }}</td>
            <td class="text-nowrap text-end">
                <a href="{{ route('consolidados.show', $consolidado) }}" class="btn btn-sm btn-primary">{!! $icons->eye !!}</a>
            </td>
        </tr>
        @endforeach
        @endslot    
    @endcomponent
    @endslot
@endcomponent

@component('components.pagination-simple', [
    'collection' => $consolidados
])
@endcomponent
<br>
@endsection
