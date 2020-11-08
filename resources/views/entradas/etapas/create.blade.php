@extends('app')
@section('content')
<div class="card">
    <div class="card-header">Agregar etapa</div>
    <div class="card-body">

        <!-- Entrada -->
        <div class="form-group">
            <label for="" class="small">Entrada</label>
            <div class="form-control bg-light">{{ $entrada->numero }}</div>
        </div>

        <!-- Etapas -->
        <form action="{{ route('entrada.etapas.create', $entrada) }}" method="get">
            <div class="form-group">
                <label for="select-slug">
                    <small>Etapas</small>
                </label>
                <select name="slug" id="select-slug" class="form-control" onchange="submit()">
                    <option label="Selecciona..." disabled selected></option>
                    @foreach($etapas as $stage)
                    <option value="{{ $stage->slug }}" {{ selectable($etapa->slug, $stage->slug) }}>{{ $stage->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </form> 
             
        <!-- Etapa -->
        @if( $etapa->id )
        <form action="{{ route('entrada.etapas.store', $entrada) }}" method="post" autocomplete="off">
            @csrf    
            @include('entradas.etapas._medidas')
            @include('entradas.etapas._zonas')
            @include('entradas.etapas._alertas')
            <br>
            <button class="btn btn-success" type="submit" name="etapa" value="{{ $etapa->id }}">Guardar etapa</button>
            <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-secondary">Cancelar</a>
        </form>
        @endif
    </div>
</div>
@endsection
