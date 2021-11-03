@extends('app')
@section('content')

<div class="row">

    <!-- Column Information -->
    <div class="col-sm">
        @component('@.bootstrap.card', [
            'pretitle' => 'Código Reempacado',
            'title' => $codigor->nombre,
        ])
            <p>
                <small class="d-block text-muted">Descripción</small>
                <span>{{ $codigor->descripcion }}</span>
            </p>

            <hr class="text-secondary">

            <p class="m-0">
                <small class="d-block text-muted">Contadores</small>
            </p>

            @component('@.bootstrap.table')
                <tr>
                    <td>Entradas</td>
                    <td class="text-end">
                        <a href="{{ route('entradas.index', ['codigor' => $codigor->id, 'filter' => csrf_token()]) }}" class="link-primary text-decoration-none">{{ $entradas->count() }}</a>
                    </td>
                </tr>
            @endcomponent

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
            'pretitle' => 'Últimas',
            'title' => 'Entradas actualizadas'
        ])
            @include('@.partials.table-entradas.content', [
                'entradas' => $entradas
            ])
        @endcomponent
    </div>
</div>
<br>

@endsection
