@extends('app')
@section('content')
@include('components.error')
<p class="text-info text-right small">
    <b>{{ $entrada->alias_numero ?? $entrada->numero }}</b>
</p>
<div class="card">
    <div class="card-header">
        <p class="m-0">Editar @yield('update')</p>
    </div> 
    <div class="card-body">
        <form action="{{ route('entradas.update', $entrada) }}" method="post" autocomplete="off">
            <input type="hidden" name="update" value="@yield('update')">
            @method('put')
            @csrf
            @yield('form_content')
            <br>
            <button class="btn btn-warning" type="submit">Actualizar @yield('update')</button>
            <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</div>
@endsection