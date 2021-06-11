@extends('app')
@section('content')

@component('@.subnavs.salidas')
    @slot('active', 2)
@endcomponent

@component('components.card', [
    'header_title' => 'Incidentes',
    'header_title_badge' => $incidentes->count(),
])
    @slot('header_options')
    <a href="{{ route('incidentes.create') }}" class="btn btn-sm btn-outline-primary">Nuevo incidente</a>
    @endslot

    @slot('body')
    @component('components.table', [
        'thead' => ['Título','Descripción'],
    ])
        @slot('tbody')
        @foreach($incidentes as $incidente)
        <tr>
            <td class="text-nowrap">{{ $incidente->titulo }}</td>
            <td class="text-nowrap">{{ $incidente->descripcion }}</td>
            <td class="text-nowrap text-end">
                <a href="{{ route('incidentes.edit', $incidente) }}" class="btn btn-warning btn-sm">
                    {!! $icons->pencil !!}
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
