@extends('app')
@section('content')

@include('@.layouts.errors')

<div class="text-center">
    <div class="btn-group">
    @foreach( $presenter->links() as $link )
        {!! $link !!}
    @endforeach
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
        @include('entradas.show.modal-comentarios')

        <!-- Imprimir -->
        <div class="dropdown d-inline-block ms-1">
            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuPrintEntrada" data-bs-toggle="dropdown" aria-expanded="false">
                {!! $graffiti->design('printer-fill')->svg() !!}
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuPrintEntrada">
                <li><a class="dropdown-item" href="{{ route('entradas.imprimir', $entrada) }}">Información</a></li>
                <li class="dropdown-divider"></li>
                <li class="dropdown-header">Guías de impresión</li>
                @foreach ($guias_impresion as $guia)
                <li><a class="dropdown-item" href="{{ route('entradas.imprimir', [$entrada, $guia]) }}">{{ $guia->nombre }}</a></li>
                @endforeach
            </ul>
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
        @include("entradas.show.{$presenter->showname()}")
    </div>
</div>

@endsection
