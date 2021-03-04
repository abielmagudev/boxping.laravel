@extends('app')
@section('content')

@component('partials.subnav-etapas')
    @slot('active','alertas')
@endcomponent

@component('components.card', [
    'header_title' => 'Alertas',
    'header_title_badge' => $alertas->count(),
])
    @slot('header_options')
    <a href="{{ route('alertas.create') }}" class="btn btn-outline-primary btn-sm">
        <span>Nueva alerta</span>
    </a>
    @endslot

    @slot('body')
    @component('components.table', [
        'thead' => ['Nivel','Nombre','Descripción']
    ])
    @slot('tbody')
        @foreach($alertas as $alerta)
        <tr>
            <td class="text-center" style="width:1%">
                <span style="color:{{ $config[$alerta->nivel]['color']}}">{!! $symbols->circle !!}</span>
            </td>
            <td class="text-nowrap">{{ $alerta->nombre }}</td>
            <td class="text-nowrap">{{ $alerta->descripcion }}</td>
            <td class="text-end">
                <a href="{{ route('alertas.edit', $alerta) }}" class="btn btn-warning btn-sm">
                    {!! $icons->pencil !!}
                </a>
            </td>
        </tr>
        @endforeach
    @endslot
    @endcomponent
    @endslot
@endcomponent
@endsection
