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
            <div class="d-flex justify-content-between">
                <div>
                    <small class="fw-bold">Total de entradas</small>
                </div>
                <div class="text-end">
                    <a href="<?= route('entradas.index', ['reempacador' => $reempacador->id, 'filtered_token' => csrf_token()]) ?>">{{ $entradas_total }}</a>
                </div>
            </div>
            <br>

            @component('@.bootstrap.table', [
                'thead' => ['Código', 'Entradas'],
            ])
                @foreach($codigosr_counter as $codigor)
                <?php $params = ['reempacador' => $reempacador->id, 'codigor' => $codigor->id, 'filtered_token' => csrf_token()] ?>
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
