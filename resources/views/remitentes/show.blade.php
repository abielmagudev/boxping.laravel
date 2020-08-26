@extends('app')
@section('content')
<div class="row">
    <div class="col-sm col-sm-3">
        @include('remitentes.show.remitente')
    </div>
    <div class="col-sm">
        @include('remitentes.show.entradas')
    </div>
</div>
<br>
<div class="float-right">
    @include('remitentes.show.eliminar')
</div>
<br>
@endsection