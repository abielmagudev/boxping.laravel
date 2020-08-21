@extends('app')
@section('content')
@include('components.error')
@include('entradas.show.buttons-actions')
<div class="form-row">

    <!-- Informacion -->
    <div class="col-sm col-sm-4">
        <div class="card">
            <div class="card-header">Información</div>
            <div class="card-body">
                <div class="overflow-auto pb-3">
                    @include('entradas.show.tabs')
                </div>
                <div class="tab-content" id="entrada-tabs-contents">
                    @include('entradas.show.contents.entrada')
                    @include('entradas.show.contents.cruce')
                    @include('entradas.show.contents.reempaque')
                    @include('entradas.show.contents.remitente')
                    @include('entradas.show.contents.destinatario')
                    @include('entradas.show.contents.salida')
                </div>
            </div>
        </div>
        <br>
    </div>

    <!-- Medidas -->
    <div class="col-sm">
        <div class="card">
            <div class="card-header">
                <span>Medidas</span>
            </div>
            <div class="card-body p-0">
                @include('entradas.show.medidas')
            </div>
        </div>
    </div>
</div>
@include('entradas.show.eliminar')
@include('entradas.modals.observaciones')
@endsection
