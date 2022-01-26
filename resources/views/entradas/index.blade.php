@extends('app')
@section('content')

@include('entradas.components.index.card', [
    'entradas' => $entradas,
    'options' => true, 
    'pagination' => true,
])

@endsection
