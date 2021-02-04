@extends('app')
@section('content')
@include('entradas.show.acciones')
<div class="row" style="height:480px">
    <!-- Informacion -->
    <div class="col-sm mb-3 mb-md-0">
        @include('entradas.show.informacion.layout')
    </div>

    <!-- Trayectoria -->
    <div class="col-sm">
        @include('entradas.show.trayectoria.layout')
    </div>
</div>
<br>
<br>

<!-- Etapas -->
@include('entradas.show.etapas')
<br>

@include('entradas.show.modal-comentarios')
@include('entradas.trayectoria.modal-search-destinatarios')
@include('entradas.trayectoria.modal-search-remitentes')
<div class="float-right">
    @include('entradas.show.eliminar')
</div>
<br>
@endsection
