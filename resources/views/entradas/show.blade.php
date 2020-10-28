@extends('app')
@section('content')
@include('components.error')
@include('entradas.show.acciones')

<div class="row" style="height:512px">
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

<!-- Etapas -->
@include('entradas.show.etapas')
<br>

<div class="float-right">
    @include('entradas.show.eliminar')
</div>
<br>

@include('entradas.show.modal-comentarios')
@endsection
