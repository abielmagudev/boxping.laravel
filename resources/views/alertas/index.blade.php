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

    <p class="text-center small">
        <span class="badge rounded-pill" style="background-color:{{ $config['bajo']['color'] }}">{{ $alertas->where('nivel', 'bajo')->count() }}</span>
        <span class="align-middle me-2">Bajo</span>
        <span class="badge rounded-pill" style="background-color:{{ $config['medio']['color'] }}">{{ $alertas->where('nivel', 'medio')->count() }}</span>
        <span class="align-middle me-2">Medio</span>
        <span class="badge rounded-pill" style="background-color:{{ $config['alto']['color'] }}">{{ $alertas->where('nivel', 'alto')->count() }}</span>
        <span class="align-middle me-2">Alto</span>
    </p>

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
