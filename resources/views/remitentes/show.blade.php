@extends('app')
@section('content')
@component('components.header', [
    'title' => $remitente->nombre,
    'subtitle' => 'Remitente',
    'goback' => route('trayectoria.index'),
])
    @slot('options')
    <a href="{{ route('remitentes.edit', $remitente) }}" class="btn btn-sm btn-warning">Editar</a>
    @endslot
@endcomponent

<div class="row">
    <!-- Column informacion -->
    <div class="col-sm">
        @component('components.card', [
            'classes' => 'h-100',
            'header_title' => 'Información',
        ])
            @slot('body')
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
                <span>{{ $remitente->codigo_postal }}</span>
            </p>
            <p>
                <small class="d-block text-muted">Localidad</small>
                <span>{{ $remitente->localidad }}</span>
            </p>
            @endslot
        @endcomponent
    </div>
    <!-- Column ultimas entradas -->
    <div class="col-sm col-sm-8">
        @component('components.card', [
            'classes' => 'h-100',
            'header_title' => 'Últimas entradas',
        ])
            @slot('body')
            @component('partials.table-summary-entradas', [
                'entradas' => $entradas,
            ])
            @endcomponent
            @endslot
        @endcomponent
    </div>
</div>
<br>
@endsection
