@extends('app')
@section('content')
    @include('trayectoria.index.tabs')
    @component('components.card')
        @slot('body')
        <div class="tab-content" id="pills-tabContent">
            @include('trayectoria.index.content-destinatarios')
            @include('trayectoria.index.content-remitentes')
        </div>
        @endslot
    @endcomponent
    <br>
@endsection
