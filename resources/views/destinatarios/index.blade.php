@extends('app')
@section('content')

@component('partials.subnav-trayectoria')
    @slot('active','destinatarios')
@endcomponent

@component('components.card', [
    'header_title' => 'Destinatarios',
    'header_title_badge' => $destinatarios->total(),
])
    @slot('header_options')
    <a href="{{ route('destinatarios.create') }}" class="btn btn-sm btn-outline-primary">Nuevo destinatario</a>
    @endslot

    @slot('body')
    @component('components.table', [
        'thead' => ['Nombre','Dirección','Postal','Localidad']
    ])
        @slot('tbody')
        @foreach($destinatarios as $destinatario)
        <tr>
            <td class="text-nowrap">{{ $destinatario->nombre }}</td>
            <td class="text-nowrap">{{ $destinatario->direccion }}</td>
            <td class="text-nowrap">{{ $destinatario->codigo_postal }}</td>
            <td class="text-nowrap">{{ $destinatario->localidad }}</td>
            <td class="text-nowrap text-end">
                <a href="{{ route('destinatarios.show', $destinatario) }}" class="btn btn-sm btn-primary">
                    {!! $icons->eye !!}
                </a>
            </td>
        </tr>
        @endforeach
        @endslot
    @endcomponent
    @endslot
@endcomponent
<br>

@component('components.pagination-simple')
    @slot('collection', $destinatarios)
@endcomponent
<br>

@endsection
