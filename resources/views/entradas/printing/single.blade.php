@extends('printing')
@section('header')
    <div class="sticky-top text-center d-print-none py-3 bg-secondary mw-100">
        <a href="{{ route('entradas.show',$entrada) }}" class="btn btn-secondary">Regresar</a>
    </div>
@endsection
@section('content')
    @include($sheet)
@endsection
