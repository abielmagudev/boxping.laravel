@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Reempacadores',
    'counter' => $reempacadores->count(),  
])
    @slot('options')
    <a href="{{ route('reempacadores.create') }}" class="btn btn-sm btn-primary">
        <span class="fw-bold">+</span>
    </a>
    @endslot

    @component('@.bootstrap.table', [
        'thead' => ['Nombre']
    ])
        @foreach($reempacadores as $reempacador)
        <tr>
            <td>{{ $reempacador->nombre }}</td>
            <td class="text-nowrap text-end">
                <a href="{{ route('reempacadores.show', $reempacador) }}" class="btn btn-sm btn-outline-primary">
                    {!! $graffiti->design('eye')->svg() !!}
                </a>
                <a href="{{ route('reempacadores.edit', $reempacador) }}" class="btn btn-sm btn-outline-warning">
                    {!! $graffiti->design('pencil-fill')->svg() !!}
                </a>
            </td>
        </tr>
        @endforeach
    @endcomponent
@endcomponent
<br>

@endsection
