@extends('app')
@section('content')

@component('components.card', [
    'header_title' => 'Etapas',
    'header_title_badge' => $etapas->count(),
])
    @slot('header_options')
    <a href="{{ route('etapas.create') }}" class="btn btn-sm btn-outline-primary">Nueva etapa</a>
    @endslot

    @slot('body')
    @component('components.table', [
        'thead' => ['Orden','Nombre','Medición','Medida de peso (Única)','Medida de volúmen (Única)',''],
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
                <a href="{{ route('etapas.show', $etapa) }}" class="btn btn-sm btn-primary">
                    {!! $icons->eye !!}
                </a>
            </td>
        </tr>
        @endforeach
        @endslot
    @endcomponent
    @endslot
@endcomponent

@endsection
