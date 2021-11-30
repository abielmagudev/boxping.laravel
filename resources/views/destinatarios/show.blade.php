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
    @component('@.bootstrap.card', [
        'title' => 'Entradas recientes',    
    ])
        @include('entradas.components.index.table', [
            'entradas' => $entradas    
        ])
    @endcomponent
    </div>
</div>
<br>

@endsection
