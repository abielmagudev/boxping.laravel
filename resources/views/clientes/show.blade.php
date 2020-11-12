@extends('app')
@section('content')
<div class="row">
    <div class="col-sm col-sm-4">
        @include('clientes.show.general')
    </div>
    <div class="col-sm">
        @include('clientes.show.entradas')
    </div>
</div>
@include('clientes.show.delete')
@endsection
