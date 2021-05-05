@extends('app')
@section('content')

@component('partials.card-entradas', [
    'entradas' => $entradas->getCollection(),
])    
@endcomponent

@component('components.pagination-simple')
    @slot('collection', $entradas)
@endcomponent
<br>

@endsection
