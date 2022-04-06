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
            <div class="d-flex justify-content-between">
                <div>
                    <small class="fw-bold">Total de entradas</small>
                </div>
                <div class="text-end">
                    <a href="<?= route('entradas.index', ['codigor' => $codigor->id, 'filtered_token' => csrf_token()]) ?>">{{ $entradas_total }}</a>
                </div>
            </div>
            <br>

            @component('@.bootstrap.table', [
                'thead' => ['Reempacador', 'Entradas']
            ])
                @foreach($reempacadores as $reempacador_id => $reempacador)
                <tr>
                    <td>{{ $reempacador->nombre }}</td>
                    <td class="text-end">
                        <a href="{{ route('entradas.index', ['codigor' => $codigor->id, 'reempacador' => $reempacador_id, 'filtered_token' => csrf_token()]) }}" class="link-primary text-decoration-none">{{ $reempacador->entradas->count() }}</a>
                    </td>
                </tr>
                @endforeach
            @endcomponent
        @endcomponent
    </div>

    <!-- Column Entradas -->
    <div class="col-sm col-sm-8">
        @include('entradas.index.card', [
            'title' => 'Entradas recientes',
            'entradas' => $entradas,
            'except' => [
                'checkboxes',
                'options'
            ],
        ])
    </div>
</div>
<br>

@endsection
