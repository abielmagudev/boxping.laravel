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
        'classes' => 'btn btn-primary btn-sm',
    ])
        @slot('text')
        <span class="d-inline-block d-md-none me-2">{!! $svg->chat_left_text_fill !!}</span>
        <span class="d-none d-md-inline-block me-1">Comentarios</span>
        <span class="badge border border-white">{{ $comentarios->count() }}</span>
        @endslot
    @endcomponent

    @include('@.partials.entradas-printing.single-sheets-dropdown')

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
                @include('entradas.show.proceso.actualizaciones')
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
@component('@.bootstrap.card')
    @slot('header')
    @component('@.bootstrap.grid-left-right')
        @slot('left')
        <span>Etapas</span> 
        <span class="badge bg-secondary text-white">{{ $entrada->etapas->count() }}</span>
        @endslot

        @slot('right')
        <a href="{{ route('entrada.etapas.create', $entrada) }}" class="btn btn-sm btn-primary">
            <span class="d-block d-md-none fw-bold">+</span>
            <span class="d-none d-md-block">Agregar etapa</span>
        </a>
        @endslot
    @endcomponent
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

@endsection
