@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Códigos Reempacado',
    'counter' => $codigosr->count(),    
])
    @slot('options')
    <a href="{{ route('codigosr.create') }}" class="btn btn-sm btn-primary">
        <span class="fw-bold">+</span>
    </a>
    @endslot

    @component('@.bootstrap.table', [
        'thead' => ['Nombre','Descripción'],
    ])
        @foreach($codigosr as $codigor)
        <tr>
            <td>{{ $codigor->nombre }}</td>
            <td>{{ $codigor->descripcion }}</td>
            <td class="text-nowrap text-end">
                <a href="{{ route('codigosr.show', $codigor) }}" class="btn btn-sm btn-outline-primary">
                    {!! $graffiti->design('eye')->svg() !!}
                </a>
                <a href="{{ route('codigosr.edit', $codigor) }}" class="btn btn-sm btn-outline-warning">
                    {!! $graffiti->design('pencil-fill')->svg() !!}
                </a>
            </td>
        </tr>
        @endforeach
    @endcomponent
@endcomponent
<br>

@endsection
