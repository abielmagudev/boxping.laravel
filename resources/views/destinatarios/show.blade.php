@extends('app')
@section('content')
<div class="row">
    <div class="col-sm col-sm-4">
        @include('destinatarios.show._destinatario')
    </div>
    <div class="col-sm">
        @include('destinatarios.show._entradas')
    </div>
</div>
<br>
<div class="float-right">
@include('destinatarios.show._eliminar')
</div>
<br>
@endsection
