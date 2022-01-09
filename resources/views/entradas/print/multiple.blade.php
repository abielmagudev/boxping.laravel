@extends('print')
@section('content')
@foreach($entradas as $entrada)   
    @include('entradas.print._content')
    <div class="break-before"></div>
@endforeach
@endsection
