@extends('app')
@section('content')

@component('@.subnavs.etapas-alertas')
    @slot('active', 1)
@endcomponent

@component('@.bootstrap.page-header', [
    'title' => 'Etapas',
    'counter' => $etapas->count()
])   
    @slot('options')
    <a href="{{ route('etapas.create') }}" class="btn btn-sm btn-primary">
        <span class="d-block d-md-none fw-bold">+</span>
        <span class="d-none d-md-block">Nueva etapa</span>
    </a>
    @endslot
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    @component('@.bootstrap.table', [
        'thead' => ['Orden','Nombre','Medición','Medida de peso','Medida de volúmen'],
    ])
        @slot('tbody')
        @foreach($etapas as $etapa)
        <tr>
            <td>{{ $etapa->orden }}</td>
            <td>{{ $etapa->nombre }}</td>
            <td>{{ $etapa->realiza_medicion ? 'Si' : 'No' }}</td>
            <td class="text-capitalize {{ $etapa->unica_medida_peso ? '' : 'text-muted' }}">{{ $etapa->unica_medida_peso ?? 'opcional' }}</td>
            <td class="text-capitalize {{ $etapa->unica_medida_volumen ? '' : 'text-muted' }}">{{ $etapa->unica_medida_volumen ?? 'opcional' }}</td>
            <td class="text-end">
                <a href="{{ route('etapas.show', $etapa) }}" class="btn btn-sm btn-outline-primary">
                    {!! $svg->eye !!}
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
