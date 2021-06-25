@extends('app')
@section('content')

@component('@.subnavs.trayectorias')
    @slot('active', 1)
@endcomponent

@component('@.bootstrap.page-header', [
    'title' => 'Remitentes',
    'counter' => $remitentes->count(),
])
    @slot('options')
    <a href="{{ route('remitentes.create') }}" class="btn btn-sm btn-primary">
        <span class="d-block d-md-none fw-bold">+</span>
        <span class="d-none d-md-block">Nuevo remitente</span>
    </a>
    @endslot
@endcomponent

@component('@.bootstrap.card')
    @slot('body')

    @component('@.bootstrap.table', [
        'thead' => ['Nombre','Dirección','Postal','Localidad'],
    ])
        @slot('tbody')
        @foreach($remitentes as $remitente)
        <tr>
            <td class="text-nowrap">{{ $remitente->nombre }}</td>
            <td class="text-nowrap">{{ $remitente->direccion }}</td>
            <td class="text-nowrap">{{ $remitente->codigo_postal }}</td>
            <td class="text-nowrap">{{ $remitente->localidad }}</td>
            <td class="text-nowrap text-end">
                <a href="{{ route('remitentes.show', $remitente) }}" class="btn btn-sm btn-outline-primary">{!! $svg->eye !!}</a>
            </td>
        </tr>
        @endforeach
        @endslot
    @endcomponent

    @endslot
@endcomponent
<br>

@component('@.bootstrap.pagination-simple')
    @slot('collection', $remitentes)
@endcomponent
<br>

@endsection
