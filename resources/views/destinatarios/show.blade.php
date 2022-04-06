@extends('app')
@section('content')

@include('@.bootstrap.page-header', [
    'pretitle' => 'Destinatario',
    'title' => $destinatario->nombre,
])

<div class="row">
    <!-- Column informacion -->
    <div class="col-sm col-sm-4">
    @component('@.bootstrap.card', [
        'title' => 'Información',    
    ])
        <div class="d-flex justify-content-between">
            <div>
                <small class="fw-bold">Total de entradas</small>
            </div>
            <div class="text-end">
                <a href="<?= route('entradas.index', ['destinatario' => $destinatario->id, 'filtered_token' => csrf_token()]) ?>">{{ $entradas_total }}</a>
            </div>
        </div>
        <br>

        <p>
            <small class="d-block text-muted">Teléfono</small>
            <span>{{ $destinatario->telefono }}</span>
        </p>
        <p>
            <small class="d-block text-muted">Dirección</small>
            <span>{{ $destinatario->direccion }}</span>
        </p>
        <p>
            <small class="d-block text-muted">Postal</small>
            <span>{{ $destinatario->postal }}</span>
        </p>
        <p>
            <small class="d-block text-muted">Localidad</small>
            <span>{{ $destinatario->localidad }}</span>
        </p>
        <p>
            <small class="d-block text-muted">Referencias</small>
            <span>{{ $destinatario->referencias }}</span>
        </p>
        <p>
            <small class="d-block text-muted">Notas</small>
            <span>{{ $destinatario->notas }}</span>
        </p>
    @endcomponent
    </div>

    <!-- Columnd entradas -->
    <div class="col-sm">
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
