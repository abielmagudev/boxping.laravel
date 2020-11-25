@extends('app')
@section('content')
<div class="row">
    <div class="col-sm col-sm-4">
        @include('destinatarios.show.informacion')
    </div>
    <div class="col-sm">
        @include('destinatarios.show.entradas')
    </div>
</div>
@include('destinatarios.show.eliminar')
@endsection
