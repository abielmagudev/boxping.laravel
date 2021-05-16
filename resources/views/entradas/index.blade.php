@extends('app')
@section('content')

@component('partials.card-entradas', [
    'entradas' => $has_pagination ? $entradas->getCollection() : $entradas,
    'entradas_count' => $has_pagination ? $entradas->total() : $entradas->count(),
    'route_nueva_entrada' => route('entradas.create'),
    'route_filtrado' => route('entradas.index'),
])    
@endcomponent
<br>

@if( $has_pagination )
    @component('components.pagination-simple', [
        'collection' => $entradas,
    ])
    @endcomponent
@endif

@endsection
