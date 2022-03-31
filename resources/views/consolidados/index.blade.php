@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'title' => 'Consolidados',
    'counter' => $consolidados->total(),
])
    @slot('center')
    <div class="d-flex">
        <div class="d-flex">
            <span class="badge text-dark" style="background-color:<?= $all_status->abierto['color'] ?>">
                {{ $all_consolidados->where('status', 'abierto')->count() }}
            </span>
            <span class="d-none d-md-inline-block badge bg-light text-dark">Abierto</span>
        </div>
        <div class="vr mx-1 mx-md-3"></div>
        <div class="d-flex">
            <span class="badge" style="background-color:<?= $all_status->cerrado['color'] ?>">
                {{ $all_consolidados->where('status', 'cerrado')->count() }}
            </span>
            <span class="d-none d-md-inline-block badge bg-light text-dark">Cerrado</span>
        </div>
    </div>
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
                    {!! $graffiti->design('circle-fill', ['style' => "color:{$consolidado->color}"])->svg() !!}
                </span>
            </td>
            <td class="min-width:288px">{{ $consolidado->numero }}</td>
            <td>{{ $consolidado->cliente_id ? "{$consolidado->cliente->nombre}" : '<small>Ninguno</small>' }}</td>
            <td>{{ $consolidado->tarimas }}</td>
            <td>{{ $consolidado->entradas_count }}</td>
            <td class="text-nowrap text-end">
                <a href="{{ route('consolidados.show', $consolidado) }}" class="btn btn-sm btn-outline-primary">
                    {!! $graffiti->design('eye')->svg() !!}
                </a>
                <a href="{{ route('consolidados.edit', $consolidado) }}" class="btn btn-sm btn-outline-warning">
                    {!! $graffiti->design('pencil-fill')->svg() !!}
                </a>
            </td>
        </tr>
        @endforeach
    @endcomponent
@endcomponent
<br>

@include('@.bootstrap.pagination-simple', ['collection' => $consolidados])
<br>

@endsection
