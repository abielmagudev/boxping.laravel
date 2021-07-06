@extends('app')
@section('content')

@component('@.subnavs.transportadoras-incidentes')
    @slot('active', 2)
@endcomponent

@component('@.bootstrap.page-header', [
    'counter' => $incidentes->count(),
    'title' => 'Incidentes',
])
    @slot('options')
    <a href="{{ route('incidentes.create') }}" class="btn btn-sm btn-primary">
        <span class="d-block d-md-none fw-bold">+</span>
        <span class="d-none d-md-block">Nuevo incidente</span>
    </a>
    @endslot
@endcomponent

@component('@.bootstrap.card')
    @slot('body')
        @component('@.bootstrap.table', [
            'thead' => ['Título','Descripción'],
        ])
            @slot('tbody')
            @foreach($incidentes as $incidente)
            <tr>
                <td class="text-nowrap">{{ $incidente->titulo }}</td>
                <td class="text-nowrap">{{ $incidente->descripcion }}</td>
                <td class="text-nowrap text-end">
                    <a href="{{ route('incidentes.edit', $incidente) }}" class="btn btn-sm btn-outline-warning">
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
