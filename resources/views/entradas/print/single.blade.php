@extends('print')
@section('style')
    @include('entradas.print._style')
@endsection

@section('header')
    @include('entradas.print._back')
@endsection

@section('content')
    @include('entradas.print._contents')
@endsection
