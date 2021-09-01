@extends('app')
@section('content')

<!-- Cabecera -->
@component('@.bootstrap.page-header', [
    'pretitle' => 'Entrada',
    'title' => $entrada->numero,
])
    @slot('options')
    
    @component('@.bootstrap.modal-trigger', [
        'modal_id' => 'modalComentarios',
        'classes' => 'btn btn-sm btn-outline-primary',
    ])
        @slot('text')
        <span class="d-inline-block d-md-none me-2">{!! $svg->chat_left_text_fill !!}</span>
        <span class="d-none d-md-inline-block me-1">Comentarios</span>
        <span class="badge bg-primary">{{ $comentarios->count() }}</span>
        @endslot
    @endcomponent

    <div class="dropdown d-inline-block">
        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuPrintEntrada" data-bs-toggle="dropdown" aria-expanded="false">
            <span>Imprimir</span>
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
@endcomponent

<!-- Proceso y trayectoria -->
<div class="row" style="min-height:520px">
    
    <!-- Proceso de la entrada -->
    <div class="col-sm mb-3">
        @component('@.bootstrap.card')
            @slot('classes', 'h-100')
            @slot('header')
                @include('entradas.show.paquete.tabs')
            @endslot

            @slot('body_classes', 'overflow-scroll')
            @slot('body')
            <div class="tab-content mt-3" id="paqueteContentTabs">
                @include('entradas.show.paquete.informacion')
                @include('entradas.show.paquete.reempaque')
                @include('entradas.show.paquete.importacion')
            </div>

            @endslot
        @endcomponent
    </div>

    <!-- Trayectoria de la entrada -->
    <div class="col-sm mb-3">
        @component('@.bootstrap.card')
            @slot('classes', 'h-100')
            @slot('header')
                @include('entradas.show.trayectoria.tabs')
            @endslot

            @slot('body_classes', 'overflow-scroll')
            @slot('body')
            <div class="tab-content mt-3" id="trayectoriaContentTabs">
                @include('entradas.show.trayectoria.salida')
                @include('entradas.show.trayectoria.destinatario')
                @include('entradas.show.trayectoria.remitente')
            </div>
            @endslot
        @endcomponent
    </div>
</div>
<br>

@include('entradas.show.etapas')

<br>

@include('entradas.show.actualizaciones')

@include('comentarios.modal-create')

@endsection
