@extends('app')
@section('content')
<div class="row">
    <div class="col-sm">
        @include('conductores.show.informacion')
    </div>
    <div class="col-sm col-sm-8">
        @include('conductores.show.entradas')
    </div>
</div>
@include('conductores.show.delete')
@endsection
