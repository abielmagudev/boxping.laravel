@extends('app')
@section('content')
<div class="row">
    <div class="col-sm">
        @include('vehiculos.show.informacion')
    </div>
    <div class="col-sm col-sm-8">
        @include('vehiculos.show.resumen')
    </div>
</div>
<br>
<div class="float-right">
    @include('vehiculos._delete')
</div>
<br>
@endsection
