@extends('app')
@section('content')

@component('@.bootstrap.page-header', [
    'pretitle' => 'Remitente',
    'title' => $remitente->nombre,
    'goback' => route('remitentes.index'),
])
    @slot('options')
    <a href="{{ route('remitentes.edit', $remitente) }}" class="btn btn-sm btn-warning">
        <span class="d-block d-md-none">{!! $svg->pencil_fill !!}</span>
        <span class="d-none d-md-block">Editar</span>
    </a>
    @endslot
@endcomponent

<div class="row">
    <!-- Column informacion -->
    <div class="col-sm">
        @component('@.bootstrap.card', [
            'header' => 'Información',
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
            @endslot
        @endcomponent
    </div>

    <!-- Column ultimas entradas -->
    <div class="col-sm col-sm-8">
        @component('@.bootstrap.card', [
            'header' => 'Entradas recientes',
        ])
            @slot('body')
            @if( count($entradas) )
                @component('@.partials.entradas-table', [
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
