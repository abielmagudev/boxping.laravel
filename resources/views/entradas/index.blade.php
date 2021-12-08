@extends('app')
@section('content')

@include('entradas.components.index.card', [
    'dropdown' => [
        'except' => false
    ],
])

@endsection
