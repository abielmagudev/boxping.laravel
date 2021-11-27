@extends('app')
@section('content')

<div class="text-center">
    <div class="btn-group">
        <a href="{{ route('entradas.show', [$entrada, 'show' => 'informacion']) }}" class="btn btn-primary {{ request()->input('show', 'informacion') === 'informacion' ? 'active' : '' }}" aria-current="page">Información</a>
        <a href="{{ route('entradas.show', [$entrada, 'show' => 'etapas']) }}" class="btn btn-primary {{ request()->input('show') === 'etapas' ? 'active' : '' }}">Etapas</a>
        <a href="{{ route('entradas.show', [$entrada, 'show' => 'actualizaciones']) }}" class="btn btn-primary {{ request()->input('show') === 'actualizaciones' ? 'active' : '' }}">Actualizaciones</a>
    </div>
</div>
<br>

<div class="row">
    <div class="col-sm col-sm-4">
    @component('@.bootstrap.card', [
        'title' => 'Entrada'
    ])

        @slot('options')
        <!-- Comentarios -->
        @include('entradas.show.modal-comentarios.trigger')

        <!-- Imprimir -->
        <div class="dropdown d-inline-block">
            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuPrintEntrada" data-bs-toggle="dropdown" aria-expanded="false">
                {!! $graffiti->design('printer-fill')->draw('svg') !!}
            </button>
            @if( $guias_impresion->count() )            
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuPrintEntrada">

                @foreach ($guias_impresion as $guia)
                <li><a class="dropdown-item" href="{{ route('entradas.imprimir', [$entrada, $guia]) }}">{{ $guia->nombre }}</a></li>
                @endforeach

            </ul>
            @endif
        </div>
        @endslot

        <label class="text-muted small">Número</label>
        <p>{{ $entrada->numero }}</p>

        <label class="text-muted small">Cliente</label>
        <p>{{ $entrada->cliente->nombre }}</p>

        <label class="text-muted small">Consolidado</label>
        <p>
            @if( $entrada->hasConsolidado() )
            <a href="{{ route('consolidados.show', $entrada->consolidado) }}" class="link-primary">{{ $entrada->consolidado->numero }}</a>
            
            @else
            <span>&nbsp;</span>
            
            @endif
        </p>

        <label class="text-muted small">Contenido</label>
        <p>{!! $entrada->hasContenido() ? $entrada->contenido_html : 'Desconocido' !!}</p>

        <label class="text-muted small">Actualizado</label>
        <p>{{ $entrada->fecha_hora_actualizado }}<br>{{ $entrada->updater->name }}</p>   
        <br>

        <div class="text-end">
            <a href="{{ route('entradas.edit', [$entrada, 'editor' => 'informacion']) }}" class="btn btn-warning btn-sm">
                <span>Editar</span>
            </a>
        </div>
        @endcomponent
    </div>

    <div class="col-sm col-sm-8">
        @include("entradas.show.{$show}")
    </div>
</div>

@include('entradas.show.modal-comentarios.modal')

@endsection
