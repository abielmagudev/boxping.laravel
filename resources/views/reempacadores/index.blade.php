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
                    @include('@.bootstrap.icon', ['icon' => 'eye'])
                </a>
                <a href="{{ route('reempacadores.edit', $reempacador) }}" class="btn btn-sm btn-outline-warning">
                    @include('@.bootstrap.icon', ['icon' => 'pencil-fill'])
                </a>
            </td>
        </tr>
        @endforeach
    @endcomponent
@endcomponent
<br>

@endsection
