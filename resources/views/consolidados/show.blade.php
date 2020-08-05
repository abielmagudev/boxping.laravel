@extends('app')
@section('content')
<div class="row">
    <div class="col-sm">
        @include('consolidados.show.consolidado')
        <br>
        @include('consolidados.show.eliminar')
    </div>
    <div class="col-sm col-sm-8">
        @include('consolidados.show.entradas')
    </div>
</div>
<br>
@endsection