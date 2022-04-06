@extends('app')
@section('content')

@include('@.bootstrap.page-header', [
    'pretitle' => 'Remitente',
    'title' => $remitente->nombre,
])

<div class="row">
    <!-- Column informacion -->
    <div class="col-sm">
        @component('@.bootstrap.card', [
            'title' => 'Información',
        ])
            <div class="d-flex justify-content-between">
                <div>
                    <small class="fw-bold">Total de entradas</small>
                </div>
                <div class="text-end">
                    <a href="<?= route('entradas.index', ['remitente' => $remitente->id, 'filtered_token' => csrf_token()]) ?>">{{ $entradas_total }}</a>
                </div>
            </div>
            <br>
        
            <p>
                <small class="d-block text-muted">Teléfono</small>
                <span>{{ $remitente->telefono }}</span>
            </p>
            <p>
                <small class="d-block text-muted">Dirección</small>
                <span>{{ $remitente->direccion }}</span>
            </p>
            <p>
                <small class="d-block text-muted">Código postal</small>
                <span>{{ $remitente->postal }}</span>
            </p>
            <p>
                <small class="d-block text-muted">Localidad</small>
                <span>{{ $remitente->localidad }}</span>
            </p>
            <p>
                <small class="d-block text-muted">Notas</small>
                <span>{{ $remitente->notas }}</span>
            </p>
        @endcomponent
    </div>

    <!-- Column entradas recientes -->
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
