@extends('app')
@section('content')

@include('@.layouts.errors')

@include('entradas.components.index.card', [
    'entradas' => $entradas
])

@endsection
