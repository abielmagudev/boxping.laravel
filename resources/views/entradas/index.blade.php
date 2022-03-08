@extends('app')
@section('content')

@include('entradas.components.index.card', [
    'entradas' => $entradas
])

@endsection
