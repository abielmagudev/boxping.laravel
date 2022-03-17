@extends('app')
@section('content')

@include('@.layouts.errors')

@include('entradas.index.card', [
    'entradas' => $entradas,
])

@endsection
