@extends('printing')
@section('content')
@if( $entradas->count() )
@foreach($entradas as $entrada)

    @component('partials.printing-entrada', [
        'entrada' => $entrada
    ])
    @endcomponent

@endforeach
@endif
@endsection
