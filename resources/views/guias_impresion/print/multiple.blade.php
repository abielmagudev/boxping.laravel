@extends('print')
@section('style')
    @include('guias_impresion.print._style')
@endsection
@section('content')
@foreach($entradas as $entrada)   
    @include('guias_impresion.print._content')
    <div class="break-before"></div>
@endforeach
@endsection
