@extends('app')
@section('content')
<div class="row">
    <div class="col-sm col-sm-4">
        @include('destinatarios.show.destinatario')
    </div>
    <div class="col-sm">
        @include('destinatarios.show.entradas')
    </div>
</div>
<br>
<div class="float-right">
@include('destinatarios.show.eliminar')
</div>
<br>
@endsection