@extends('app')
@section('content')

@component('components.header', [
    'title' => $destinatario->nombre,
    'subtitle' => 'Destinatario',
    'goback' => route('destinatarios.index'),
])
    @slot('options')
    <a href="{{ route('destinatarios.edit', $destinatario) }}" class="btn btn-sm btn-warning">Editar</a>
    @endslot
@endcomponent

<div class="row">
    <!-- Column informacion -->
    <div class="col-sm col-sm-4">
    @component('components.card', [
        'classes' => 'h-100',
        'header_title' => 'Información'
    ])
        @slot('body')
        <p>
            <small class="d-block text-muted">Teléfono</small>
            <span>{{ $destinatario->telefono }}</span>
        </p>
        <p>
            <small class="d-block text-muted">Dirección</small>
            <span>{{ $destinatario->direccion }}</span>
        </p>
        <p>
            <small class="d-block text-muted">Código postal</small>
            <span>{{ $destinatario->codigo_postal }}</span>
        </p>
        <p>
            <small class="d-block text-muted">Localidad</small>
            <span>{{ $destinatario->localidad }}</span>
        </p>
        <p>
            <small class="d-block text-muted">Referencias</small>
            <span>{{ $destinatario->referencias }}</span>
        </p>
        @endslot
    @endcomponent
    </div>
    <!-- Columnd entradas -->
    <div class="col-sm">
    @component('components.card', [
        'classes' => 'h-100',
        'header_title' => 'Últimas entradas'
    ])
        @slot('body')
        @if( count($entradas) )
        @component('partials.table-summary-entradas', [
            'entradas' => $entradas,
        ])
        @endcomponent
        @endif
        @endslot
    @endcomponent
    </div>
</div>
<br>
@endsection
