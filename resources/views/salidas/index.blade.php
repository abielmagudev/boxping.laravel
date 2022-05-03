@extends('app')
@section('content')

@include('salidas.index.card', [
    'settings' => [
        'salidas' => $salidas
    ],
])
@include('salidas.index.pagination')

@endsection
