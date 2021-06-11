@extends('app')
@section('content')

@component('@.bootstrap.header', [
    'pretitle' => 'Destinatario',
    'title' => $destinatario->nombre,
])
    @slot('options')
    <a href="{{ route('destinatarios.edit', $destinatario) }}" class="btn btn-sm btn-warning">
        <span class="d-block d-md-none">{!! $svg->pencil_fill !!}</span>
        <span class="d-none d-md-block">Editar</span>
    </a>
    @endslot
@endcomponent

<div class="row">
    <!-- Column informacion -->
    <div class="col-sm col-sm-4">
    @component('@.bootstrap.card')
        @slot('header', 'Información')
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
    @component('@.bootstrap.card')
        @slot('header', 'Entradas recientes')
        @slot('body')
        
        @if( count($entradas) )
        @component('@.partials.table-entradas')
            @slot('entradas', $entradas)
        @endcomponent
        @endif

        @endslot
    @endcomponent
    </div>
</div>
<br>
@endsection
