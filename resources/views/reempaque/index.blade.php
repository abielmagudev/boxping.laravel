@extends('app')
@section('content')
    @include('reempaque.index.tabs')
    @component('components.card')
        @slot('body')
        <div class="tab-content" id="pills-tabContent">
            @include('reempaque.index.content-reempacadores')
            @include('reempaque.index.content-codigosr')
        </div>
        @endslot
    @endcomponent
@endsection
