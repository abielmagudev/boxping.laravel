@extends('app')
@section('content')
@include('components.error')
<div class="card">
    <div class="card-header">
        <p class="m-0">Editar @yield('actualizar')</p>
    </div> 
    <div class="card-body">
        <form action="{{ route('entradas.update', $entrada) }}" method="post" autocomplete="off">
            @method('patch')
            @csrf

            @yield('form_content')
            <br>

            <input type="hidden" name="actualizar" value="@yield('actualizar')">
            <button class="btn btn-warning" type="submit">Actualizar @yield('actualizar')</button>
            <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</div>
@endsection
