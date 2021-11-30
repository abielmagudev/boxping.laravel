@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Remitentes',
    'counter' => $remitentes->count(),
])
    @slot('options')
    <a href="{{ route('remitentes.create') }}" class="btn btn-sm btn-primary">
        <span class="fw-bold">+</span>
    </a>
    @endslot

    @component('@.bootstrap.table', [
        'thead' => ['Nombre','Dirección','Postal'],
    ])
        @foreach($remitentes as $remitente)
        <tr>
            <td class="text-nowrap">{{ $remitente->nombre }}</td>
            <td class="text-nowrap">
                <span class="d-block">{{ $remitente->direccion }}</span>
                <span class="d-block">{{ $remitente->localidad }}</span>
            </td>
            <td class="text-nowrap">{{ $remitente->postal }}</td>
            <td class="text-nowrap text-end">
                <a href="{{ route('remitentes.show', $remitente) }}" class="btn btn-sm btn-outline-primary">
                    {!! $graffiti->design('eye')->svg() !!}
                </a>
                <a href="{{ route('remitentes.edit', $remitente) }}" class="btn btn-sm btn-outline-warning">
                    {!! $graffiti->design('pencil-fill')->svg() !!}
                </a>
            </td>
        </tr>
        @endforeach
    @endcomponent
@endcomponent
<br>

@include('@.bootstrap.pagination-simple', [
    'collection' => $remitentes,
])
<br>

@endsection
