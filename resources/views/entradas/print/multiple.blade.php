@extends('print')
@section('style')
    @include('entradas.print._style')
@endsection

@section('header')
    @include('entradas.print._back')
@endsection

@section('content')
@foreach($entradas as $entrada)
    @include('entradas.print._contents', ['entrada' => $entrada])
    <br>
    
    @if( ! $loop->last )
    <div class="break-before"></div>
    @endif
@endforeach
@endsection
