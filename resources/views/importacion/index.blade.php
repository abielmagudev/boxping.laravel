@extends('app')
@section('content')
    @include('importacion.index.tabs')
    @component('components.card')
        @slot('body')
        <div class="tab-content" id="pills-tabContent">
            @include('importacion.index.content-conductores')
            @include('importacion.index.content-vehiculos')
        </div>
        @endslot
    @endcomponent
@endsection
