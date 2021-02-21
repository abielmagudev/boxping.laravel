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
            <span class="badge rounded-pill" style="background-color:{{ $config_consolidados->colores['abierto'] }}">
                {{ $consolidados->where('abierto', 1)->count() }}
            </span>
            <span class="me-3 align-middle">Abierto</span>
            <span class="badge rounded-pill" style="background-color:{{ $config_consolidados->colores['cerrado'] }}">
                {{ $consolidados->where('abierto', 0)->count() }}
            </span>
            <span class="align-middle">Cerrado</span>   
        </div>
        @endslot
    @endcomponent
    <br>

    @component('components.table', [
        'hover' => true,
        'size'  => 'small',
        'thead' => ['Status','Número','Cliente','Tarimas','Entradas','']
    ])
        @slot('tbody')
        @foreach($consolidados as $consolidado)
        <tr>
            <td class="text-center" style="width:1%">
                <?php $status = $consolidado->abierto ? 'abierto' : 'cerrado' ?>
                <span daa-bs-title="{{ ucfirst($status) }}" data-bs-toggle="tooltip" data-bs-placement="top" style="color:{{ $config_consolidados->colores[$status] }}">
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
