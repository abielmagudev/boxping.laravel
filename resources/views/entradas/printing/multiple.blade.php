@extends('printing')
@section('header')
    <div class="sticky-top text-center d-print-none py-3 bg-secondary mw-100">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Regresar</a>
    </div>
@endsection
@section('content')
    @foreach($entradas as $entrada)
        <?php extract( $printing->content($entrada) ) ?>
        @include( $printing->sheet() )
    @endforeach
@endsection
