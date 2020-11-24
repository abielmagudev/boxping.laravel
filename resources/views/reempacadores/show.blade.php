@extends('app')
@section('content')
<div class="row">
    <div class="col-sm">
        @include('reempacadores.show.informacion')
        @include('reempacadores.show.modulos')
    </div>
    <div class="col-sm col-sm-8">
        @include('reempacadores.show.entradas')
    </div>
</div>
@include('reempacadores.show.eliminar')
@endsection
