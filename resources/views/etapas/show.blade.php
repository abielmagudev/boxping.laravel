@extends('app')
@section('content')
<div class="row">
    <div class="col-sm col-sm-4">
        @include('etapas.show.etapa')
    </div>
    <div class="col-sm">
        @include('etapas.show.zonas')
    </div>
</div>
<br>
@include('etapas.show.eliminar')
<br>
@endsection
