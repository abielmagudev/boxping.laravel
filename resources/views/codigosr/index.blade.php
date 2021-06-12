@extends('app')
@section('content')

@component('@.subnavs.reempaque')
    @slot('active', 2)
@endcomponent

@component('@.bootstrap.header', [
    'title' => 'Códigos de reempacado',
    'counter' => $codigosr->count(),
])
    @slot('options')
    <a href="{{ route('codigosr.create') }}" class="btn btn-sm btn-primary">
        <span class="d-block d-md-none fw-bold">+</span>
        <span class="d-none d-md-block">Nuevo código de reempacado</span>
    </a>
    @endslot
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    @component('@.bootstrap.table', [
        'thead' => ['Nombre','Descripción',''],
    ])
        @slot('tbody')
        @foreach($codigosr as $codigor)
        <tr>
            <td>{{ $codigor->nombre }}</td>
            <td>{{ $codigor->descripcion }}</td>
            <td class="text-nowrap text-end">
                <a href="{{ route('codigosr.show', $codigor) }}" class="btn btn-sm btn-outline-primary">
                    {!! $svg->eye !!}
                </a>
                <a href="{{ route('codigosr.edit', $codigor) }}" class="btn btn-sm btn-outline-warning">
                    {!! $svg->pencil !!}
                </a>
            </td>
        </tr>
        @endforeach
        @endslot
    @endcomponent

    @endslot
@endcomponent

@endsection
