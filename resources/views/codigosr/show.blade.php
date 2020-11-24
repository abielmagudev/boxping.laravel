@extends('app')
@section('content')
<div class="row">
    <div class="col-sm">
        @include('codigosr.show.informacion')
        <br>
        @include('codigosr.show.modulos')
    </div>
    <div class="col-sm col-sm-8">
        @include('codigosr.show.entradas')
    </div>
</div>
@include('codigosr.show.eliminar')
@endsection
