@extends('app')
@section('content')
<div class="row">
    <div class="col-sm col-sm-4">
        @include('clientes.show.informacion')
    </div>
    <div class="col-sm">
        @include('clientes.show.resumen')
    </div>
</div>
@include('clientes.show.eliminar')
@endsection
