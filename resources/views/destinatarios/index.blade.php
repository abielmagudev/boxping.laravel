@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Destinatarios',
    'counter' => $destinatarios->count(),
])
    @slot('options')
    <a href="{{ route('destinatarios.create') }}" class="btn btn-sm btn-primary">
        <span class="fw-bold">+</span>
    </a>
    @endslot
    @component('@.bootstrap.table', [
        'thead' => ['Nombre','Dirección','Postal', 'Teléfono'],
    ])
        @foreach($destinatarios as $destinatario)
        <tr>
            <td class="text-nowrap">{{ $destinatario->nombre }}</td>
            <td class="">
                <span>{{ $destinatario->direccion }}</span>
                <small class="d-block">{{ $destinatario->localidad }}</small>
            </td>
            <td class="text-nowrap">{{ $destinatario->postal }}</td>
            <td class="text-nowrap">{{ $destinatario->telefono }}</td>
            <td class="text-nowrap text-end">
                <a href="{{ route('destinatarios.show', $destinatario) }}" class="btn btn-sm btn-outline-primary">
                    {!! $graffiti->load('eye')->svg() !!}
                </a>
                <a href="{{ route('destinatarios.edit', $destinatario) }}" class="btn btn-sm btn-outline-warning">
                    {!! $graffiti->load('pencil-fill')->svg() !!}
                </a>    
            </td>
        </tr>
        @endforeach
    @endcomponent
@endcomponent
<br>

@component('@.bootstrap.pagination-simple')
    @slot('collection', $destinatarios)
@endcomponent
<br>

@endsection
