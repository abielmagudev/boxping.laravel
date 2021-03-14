@extends('printing')
@section('content')
@if( $entradas->count() )
@foreach($entradas as $entrada)

    @component('partials.printing-entrada-etapas', [
        'entrada' => $entrada,
        'etapas' => $entrada->etapas
    ])
    @endcomponent

@endforeach
@endif
@endsection
