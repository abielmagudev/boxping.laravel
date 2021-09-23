@extends('app')
@section('content')

@component('@.subnavs.etapas-alertas')
    @slot('active', 2)
@endcomponent

@component('@.bootstrap.page-header', [
    'title' => 'Alertas',
    'counter' => $alertas->count()
])
    @slot('options')
    <a href="{{ route('alertas.create') }}" class="btn btn-sm btn-primary">
        <span class="d-block d-md-none fw-bold">+</span>
        <span class="d-none d-md-block">Nueva alerta</span>
    </a>
    @endslot
@endcomponent

@component('@.bootstrap.card')
    @slot('header')
    <div class="text-center small">
        @foreach($all_niveles as $nivel => $attrs)        
        <span class="badge rounded-pill" style="background-color:{{ $attrs['color'] }}">{{ $alertas->where('nivel', $nivel)->count() }}</span>
        <span class="align-middle me-2">{{ ucfirst($nivel) }}</span>
        @endforeach
    </div>
    @endslot
    @slot('body')
        @component('@.bootstrap.table', [
            'thead' => ['Nivel','Nombre']
        ])
            @slot('tbody')
            @foreach($alertas as $alerta)
            <tr>
                <td class="text-center" style="width:1%">
                    <span style="color:{{ $alerta->color }}">{!! $symbols->circle !!}</span>
                </td>
                <td class="text-nowrap">{{ $alerta->nombre }}</td>
                <td class="text-end">
                    <a href="{{ route('alertas.edit', $alerta) }}" class="btn btn-sm btn-outline-warning">
                        {!! $svg->pencil !!}
                    </a>
                </td>
            </tr>
            @endforeach
            @endslot
        @endcomponent
    @endslot
@endcomponent
<br>

@endsection
