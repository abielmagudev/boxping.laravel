@extends('app')
@section('content')

@component('partials.subnav-trayectoria')
    @slot('active','remitentes')
@endcomponent

@component('components.card', [
    'header_title' => 'Remitentes',
    'header_title_badge' => $remitentes->total(),
])
    @slot('header_options')
    <a href="{{ route('remitentes.create') }}" class="btn btn-sm btn-outline-primary">Nuevo remitente</a>
    @endslot

    @slot('body')
    @component('components.table', [
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
                <a href="{{ route('remitentes.show', $remitente) }}" class="btn btn-sm btn-primary">{!! $icons->eye !!}</a>
            </td>
        </tr>
        @endforeach
        @endslot
    @endcomponent
    @endslot
@endcomponent
<br>

@component('components.pagination-simple')
    @slot('collection', $remitentes)
@endcomponent
<br>

@endsection
