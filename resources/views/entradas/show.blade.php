@extends('app')
@section('content')

@component('@.partials.page-header', [
    'pretitle' => 'Número de entrada',
    'title' => $entrada->numero,
])
    @slot('options')
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-comentarios">
        <span class="d-inline-block d-md-none me-2">{!! $svg->chat_left_text_fill !!}</span>
        <span class="d-none d-md-inline-block me-1">Comentarios</span>
        <span class="badge border border-white">{{ $comentarios->count() }}</span>
    </button>
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

<div class="row">
    <div class="col-sm mb-3">
        @include('entradas.show.informacion')
    </div>
    <div class="col-sm mb-3">
        @include('entradas.show.trayectoria')
    </div>
</div>
<br>

<!-- Etapas -->
@include('entradas.show.etapas')
<br>

@include('entradas.show.modal-comentarios')
@include('entradas.trayectoria.modal-search-destinatarios')
@include('entradas.trayectoria.modal-search-remitentes')

@endsection
