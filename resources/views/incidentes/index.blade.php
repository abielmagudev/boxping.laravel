@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'counter' => $incidentes->count(),
    'title' => 'Incidentes',
])
    @slot('options')
    <a href="{{ route('incidentes.create') }}" class="btn btn-sm btn-primary">
        <span class="fw-bold">+</span>
    </a>
    @endslot

    @component('@.bootstrap.table', [
        'thead' => ['Nombre','Descripción'],
    ])
        @foreach($incidentes as $incidente)
        <tr>
            <td class="text-nowrap">{{ $incidente->nombre }}</td>
            <td class="text-nowrap">{{ $incidente->descripcion }}</td>
            <td class="text-nowrap text-end">
                <a href="{{ route('incidentes.edit', $incidente) }}" class="btn btn-sm btn-outline-warning">
                    {!! $graffiti->design('pencil-fill')->cache('svg') !!}
                </a>
            </td>
        </tr>
        @endforeach
    @endcomponent
@endcomponent
<br>

@endsection
