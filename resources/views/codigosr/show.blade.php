@extends('app')
@section('content')

@include('@.bootstrap.page-header', [
    'pretitle' => 'Código Reempacado',
    'title' => $codigor->nombre,
])

<div class="row">

    <!-- Column Information -->
    <div class="col-sm">
        @component('@.bootstrap.card', [
            'title' => 'Información',
        ])
            <p>
                <small class="d-block text-muted">Descripción</small>
                <span>{{ $codigor->descripcion }}</span>
            </p>

            <hr class="text-secondary">

            @include('@.partials.grid-total-entradas.content', [
                'route' => route('entradas.index', ['codigor' => $codigor->id, 'filter' => csrf_token()]),
                'total' => $entradas->count(),
            ])

            <hr class="text-secondary">

            <small class="d-block text-muted">Contadores</small>
            @component('@.bootstrap.table', [
                'thead' => ['Reempacador', 'Entradas']
            ])
                @foreach($reempacadores as $reempacador_id => $reempacador)
                <tr>
                    <td>{{ $reempacador->nombre }}</td>
                    <td class="text-end">
                        <a href="{{ route('entradas.index', ['codigor' => $codigor->id, 'reempacador' => $reempacador_id, 'filter' => csrf_token()]) }}" class="link-primary text-decoration-none">{{ $reempacador->entradas->count() }}</a>
                    </td>
                </tr>
                @endforeach
            @endcomponent
        @endcomponent
    </div>

    <!-- Column Entradas -->
    <div class="col-sm col-sm-8">
        @component('@.bootstrap.card', [
            'title' => 'Entradas recientes'
        ])
            @include('@.partials.table-entradas.content', [
                'entradas' => $entradas
            ])
        @endcomponent
    </div>
</div>
<br>

@endsection
