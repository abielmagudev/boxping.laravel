@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Transportadoras',
    'counter' => $transportadoras->count()
])
    @slot('options')
    <a href="{{ route('transportadoras.create') }}" class="btn btn-sm btn-primary">
        <span class="fw-bold">+</span>
    </a>
    @endslot

    @component('@.bootstrap.table', [
        'thead' => ['Nombre', 'Teléfono']
    ])
        @foreach($transportadoras as $transportadora)
        <tr>
            <td class="text-nowrap">{{ $transportadora->nombre }}</td>
            <td class="text-nowrap">{{ $transportadora->telefono }}</td>
            <td class="text-nowrap text-end">
                @if( $transportadora->hasWeb() )
                <a href="{{ $transportadora->web }}" class="btn btn-sm btn-outline-primary" target="_blank">
                    <span>web</span>
                </a>
                @endif
                <a href="{{ route('transportadoras.show', $transportadora) }}" class="btn btn-sm btn-outline-primary">
                    @include('@.bootstrap.icon', ['icon' => 'eye'])
                </a>
                <a href="{{ route('transportadoras.edit', $transportadora) }}" class="btn btn-sm btn-outline-warning">
                    @include('@.bootstrap.icon', ['icon' => 'pencil-fill'])
                </a>
            </td>
        </tr>
        @endforeach
    @endcomponent
@endcomponent

@endsection
