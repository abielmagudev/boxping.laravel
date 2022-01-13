@extends('print')
@section('style')
    @include('guias_impresion.print._style')
@endsection
@section('content')
@foreach($entradas as $entrada)   
    @include('guias_impresion.print._information')
    @if(! $loop->last ) 
    <div class="break-before"></div>
    @endif
@endforeach
@endsection
