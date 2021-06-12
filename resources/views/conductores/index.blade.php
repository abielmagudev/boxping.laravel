@extends('app')
@section('content')

@component('@.subnavs.importacion')
    @slot('active', 1)
@endcomponent

@component('@.bootstrap.header', [
    'title' => 'Conductores',
    'counter' => $conductores->count()
])
    @slot('options')
    <a href="{{ route('conductores.create') }}" class="btn btn-sm btn-primary">
        <span class="d-block d-md-none fw-bold">+</span>
        <span class="d-none d-md-block">Nuevo conductor</span>
    </a>
    @endslot
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    @component('@.bootstrap.table')
        @slot('thead', ['Nombre'])
        @slot('tbody')
            @foreach($conductores as $conductor)
            <tr>
                <td>{{ $conductor->nombre }}</td>
                <td class="text-end">
                    <a href="{{ route('conductores.show',$conductor) }}" class="btn btn-sm btn-outline-primary">
                        {!! $svg->eye !!}
                    </a>
                    <a href="{{ route('conductores.edit',$conductor) }}" class="btn btn-sm btn-outline-warning">
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
