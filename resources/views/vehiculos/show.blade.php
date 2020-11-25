@extends('app')
@section('content')
<div class="row">
    <div class="col-sm">
        @include('vehiculos.show.informacion')
    </div>
    <div class="col-sm col-sm-8">
        @include('vehiculos.show.entradas')
    </div>
</div>

@include('vehiculos.show.eliminar')

@endsection
