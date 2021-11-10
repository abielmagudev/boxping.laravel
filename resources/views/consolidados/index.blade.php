@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Consoliddos',
    'counter' => $consolidados->count(),
])
    @slot('center')
    @foreach($all_status as $status => $attrs)   
    <span class="badge" style="background-color:<?= $attrs['color'] ?>">
        {{ $consolidados->where('status', $status)->count() }}
        {{ ucfirst($status) }}
    </span>
    @endforeach
    @endslot

    @slot('options')
    <a href="{{ route('consolidados.create') }}" class="btn btn-sm btn-primary">
        <span class="fw-bold">+</span>
    </a>
    @endslot

    @component('@.bootstrap.table', [
        'thead' => ['Status','Número','Cliente','Tarimas','Entradas']    
    ])
        @foreach($consolidados as $consolidado)
        <tr>
            <td class="text-center" style="width:1%">
                <span data-bs-title="{{ ucfirst($consolidado->status) }}" data-bs-toggle="tooltip" data-bs-placement="top" style="color:<?= $consolidado->status_color ?>">
                    @include('@.bootstrap.icon', [
                            'icon' => 'circle-fill',
                            'style' => "color:{$consolidado->color}",
                    ])
                </span>
            </td>
            <td class="min-width:288px">{{ $consolidado->numero }}</td>
            <td>{{ $consolidado->cliente_id ? "{$consolidado->cliente->nombre}" : '<small>Ninguno</small>' }}</td>
            <td>{{ $consolidado->tarimas }}</td>
            <td>{{ $consolidado->entradas->count() }}</td>
            <td class="text-nowrap text-end">
                <a href="{{ route('consolidados.show', $consolidado) }}" class="btn btn-sm btn-outline-primary">
                    @include('@.bootstrap.icon', ['icon' => 'eye'])
                </a>
                <a href="{{ route('consolidados.edit', $consolidado) }}" class="btn btn-sm btn-outline-warning">
                    @include('@.bootstrap.icon', ['icon' => 'pencil-fill'])
                </a>
            </td>
        </tr>
        @endforeach
    @endcomponent
@endcomponent
<br>

@include('@.bootstrap.pagination-simple', [
    'collection' => $consolidados
])
<br>

@endsection
