@extends('app')
@section('content')

@include('entradas.components.index.card', [
    'checkboxes' => true,
    'options' => true, 
    'pagination' => true,
])

@endsection
