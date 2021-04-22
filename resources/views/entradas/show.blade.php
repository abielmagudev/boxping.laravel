@extends('app')
@section('content')

@include('entradas.show.header')

<div class="row" style="min-height:480px">
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
