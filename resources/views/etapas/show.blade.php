@extends('app')
@section('content')
<div class="row">
    <div class="col-sm col-sm-4">
        @include('etapas.show._etapa')
    </div>
    <div class="col-sm">
        @include('etapas.show._zonas')
    </div>
</div>
<br>
@include('etapas.show._eliminar')
<br>
@endsection
