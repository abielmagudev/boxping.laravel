@extends('app')
@section('content')

@include('@.bootstrap.page-header', [
    'title' => $reempacador->nombre,
    'pretitle' => 'Reempacador',
])

<div class="row">
    <!-- Column reempacados -->
    <div class="col-sm">
        @component('@.bootstrap.card', [
            'title' => 'Información',   
        ])
            @include('@.partials.grid-total-entradas.content', [
                'route' => route('entradas.index', ['reempacador' => $reempacador->id, 'filter' => csrf_token()]),
                'total' => $entradas->count(),
            ])
            
            <hr class="text-secondary">

            <small class="text-muted">Contadores</small>
            @component('@.bootstrap.table', [
                'thead' => ['Código', 'Entradas'],
            ])
                @foreach($codigosr_counter as $codigor)
                <?php $params = ['reempacador' => $reempacador->id, 'codigor' => $codigor->id, 'filter' => csrf_token()] ?>
                <tr>
                    <td>{{ $codigor->nombre }}</td>
                    <td class="text-end">
                        <a href="{{ route('entradas.index', $params) }}" class="link-primary text-decoration-none">{{ $codigor->entradas->count() }}</a>
                    </td>
                </tr>
                @endforeach
            @endcomponent
        @endcomponent
    </div>

    <!-- Column reempacados -->
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
