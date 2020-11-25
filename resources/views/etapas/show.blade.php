@extends('app')
@section('content')
<div class="row">
    <div class="col-sm col-sm-4">
        @include('etapas.show.informacion')
    </div>
    <div class="col-sm">
        @include('etapas.show.zonas')
    </div>
</div>
@include('etapas.show.eliminar')
@endsection
