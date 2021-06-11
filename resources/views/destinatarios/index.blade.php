@extends('app')
@section('content')

@component('@.subnavs.trayectorias')
    @slot('active', 2)
@endcomponent

@component('@.bootstrap.header', [
    'title' => 'Destinatarios',
    'counter' => $destinatarios->count(),
])
    @slot('options')
    <a href="{{ route('destinatarios.create') }}" class="btn btn-sm btn-primary">
        <span class="d-block d-md-none fw-bold">+</span>
        <span class="d-none d-md-block">Nuevo destinatario</span>
    </a>
    @endslot
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    @component('@.bootstrap.table')
        @slot('thead', ['Nombre','Dirección','Postal','Localidad'])
        @slot('tbody')
        @foreach($destinatarios as $destinatario)
        <tr>
            <td class="text-nowrap">{{ $destinatario->nombre }}</td>
            <td class="text-nowrap">{{ $destinatario->direccion }}</td>
            <td class="text-nowrap">{{ $destinatario->codigo_postal }}</td>
            <td class="text-nowrap">{{ $destinatario->localidad }}</td>
            <td class="text-nowrap text-end">
                <a href="{{ route('destinatarios.show', $destinatario) }}" class="btn btn-sm btn-outline-primary">
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

@component('@.partials.pagination-simple')
    @slot('collection', $destinatarios)
@endcomponent
<br>

@endsection
