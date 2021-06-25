@extends('app')
@section('content')

@component('@.subnavs.reempaque')
    @slot('active', 1)
@endcomponent

@component('@.bootstrap.page-header', [
    'title' => 'Reempacadores',
    'counter' => $reempacadores->count(),
])
    @slot('options')
    <a href="{{ route('reempacadores.create') }}" class="btn btn-sm btn-primary">
        <span class="d-block d-md-none fw-bold">+</span>
        <span class="d-none d-md-block">Nuevo reempacador</span>
    </a>
    @endslot
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
    @component('@.bootstrap.table')
        @slot('thead', ['Nombre'])
        @slot('tbody')
        @foreach($reempacadores as $reempacador)
        <tr>
            <td>{{ $reempacador->nombre }}</td>
            <td class="text-nowrap text-end">
                <a href="{{ route('reempacadores.show', $reempacador) }}" class="btn btn-sm btn-outline-primary">
                    {!! $svg->eye !!}
                </a>
                <a href="{{ route('reempacadores.edit', $reempacador) }}" class="btn btn-sm btn-outline-warning">
                    {!! $svg->pencil !!}
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
