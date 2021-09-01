@extends('app')
@section('content')

@component('@.bootstrap.card')
    @slot('header')
    <b>Área de reempaque</b>
    @endslot

    @slot('body')
    <form action="{{ route('reempaque.update') }}" method="post" autocomplete="off">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="input-numero" class="form-label small">Número de entrada</label>
            <input type="text" class="form-control" id="input-numero" name="numero" value="{{ old('numero') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label small" for="select-codigor">Código de reempacado</label>
            <select id="select-codigor" class="form-select" name="codigor" required>
                <option selected disabled label="..."></option>
                @foreach ($codigosr as $codigor)
                <option value="{{ $codigor->id }}" <?= toggleSelected($codigor->id, old('codigor')) ?>>{{ $codigor->nombre }} - {{ $codigor->descripcion }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="input-clave" class="form-label small">Clave de reempacador</label>
            <input type="password" class="form-control" id="input-clave" name="clave" value="" required>
        </div>
        <br>
        <div class="text-center">
            <button class="btn btn-success">Guardar reempacado</button>
        </div>
    </form>
    @endslot
@endcomponent

@endsection
