@extends('app')
@section('content')

<!-- Cabecera -->
@component('@.bootstrap.page-header', [
    'pretitle' => 'Número de entrada',
    'title' => $entrada->numero,
])
    @slot('options')
    
    @component('@.bootstrap.modal-trigger', [
        'modal_id' => 'modalComentarios',
        'classes' => 'btn btn-primary btn-sm',
    ])
        @slot('text')
        <span class="d-inline-block d-md-none me-2">{!! $svg->chat_left_text_fill !!}</span>
        <span class="d-none d-md-inline-block me-1">Comentarios</span>
        <span class="badge border border-white">{{ $comentarios->count() }}</span>
        @endslot
    @endcomponent

    <div class="d-inline dropdown">
        <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="d-inline-block d-md-none me-1">{!! $svg->printer_fill !!}</span>
            <span class="d-none d-md-inline-block me-1">Imprimir</span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="{{ route('printing.entrada',[$entrada]) }}" target="_blank">Información</a></li>
            <li><a class="dropdown-item" href="{{ route('printing.entrada',[$entrada,'hoja' => 'etiqueta']) }}" target="_blank">Etiqueta</a></li>
            <li><a class="dropdown-item" href="{{ route('printing.entrada',[$entrada,'hoja' => 'etapas']) }}" target="_blank">Etapas</a></li>
        </ul>
    </div>

    <form action="https://www.estafeta.com/Herramientas/Rastreov1" method="post" class="d-none">
        <input type="hidden" name="wayBill" value="1780584755">
        <button class="btn btn-sm btn-success">Rastreo</button>
    </form>
    @endslot
@endcomponent

<!-- Proceso y trayectoria -->
<div class="row" style="min-height:560px">
    
    <!-- Proceso de la entrada -->
    <div class="col-sm mb-3">
        @component('@.bootstrap.card')
            @slot('classes', 'h-100')
            @slot('header')
                @include('entradas.show.proceso.tabs')
            @endslot

            @slot('body_classes', 'overflow-scroll')
            @slot('body')
            <div class="tab-content mt-3" id="procesamientoContentTabs">
                @include('entradas.show.proceso.guia')
                @include('entradas.show.proceso.reempaque')
                @include('entradas.show.proceso.importacion')
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

<!-- Etapas de la guia -->
@component('@.bootstrap.card-headers')
    @slot('header_left')
    <p class="m-0">Etapas <span class="badge bg-secondary text-white">{{ $entrada->etapas->count() }}</span></p>
    @endslot

    @slot('header_right')
    <a href="{{ route('entrada.etapas.create', $entrada) }}" class="btn btn-sm btn-primary">
        <span class="d-block d-md-none fw-bold">+</span>
        <span class="d-none d-md-block">Agregar</span>
    </a>
    @endslot

    @slot('body')

    @if( $entrada->etapas->count() )
    @include('entradas.show.etapas.table')

    @else
    <p class="text-center text-muted m-0">Sin etapas</p>

    @endif

    @endslot
@endcomponent
<br>

@include('entradas.show.modal-comentarios')
@include('destinatarios.modal-search', ['results_route' => route('entradas.agregar.destinatario', $entrada)])
@include('remitentes.modal-search', ['results_route' => route('entradas.agregar.remitente', $entrada)])

@endsection
