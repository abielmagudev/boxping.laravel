@extends('app')
@section('content')
<div class="row">
    <div class="col-sm col-sm-3">
        @include('remitentes.show._remitente')
    </div>
    <div class="col-sm">
        @include('remitentes.show._entradas')
    </div>
</div>
<br>
<div class="float-right">
    @include('remitentes.show._eliminar')
</div>
<br>
@endsection
