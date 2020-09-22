@extends('app')
@section('content')
@include('components.error')
@include('entradas.show.acciones')
<div class="row">

    <!-- Informacion -->
    <div class="col-sm">
        @include('entradas.show.informacion.layout')
        <br>
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

@include('entradas.modals.observaciones')
@endsection
