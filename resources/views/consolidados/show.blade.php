@extends('app')
@section('content')
<div class="row">
    <div class="col-sm">
        @include('consolidados.show.consolidado')
        <br>
    </div>
    <div class="col-sm col-sm-8">
        @include('consolidados.show.entradas')
    </div>
</div>
<br>
<div class="float-right">
    @include('consolidados.show.eliminar')
</div>
@endsection
