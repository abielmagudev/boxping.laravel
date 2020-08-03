@extends('app')
@section('content')
<div class="row">
    <div class="col-sm">
        @include('consolidados.show.consolidado')
        <br>
        <a href="{{ route('consolidados.destroy', $consolidado) }}" class="text-danger" data-toggle="modal" data-target="#confirmDeleteModal">Eliminar consolidado</a>
    </div>
    <div class="col-sm col-sm-8">
        @include('consolidados.show.entradas')
    </div>
</div>
@include('consolidados.show.eliminar')
<br>
@endsection