@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'pretitle' => $consolidado ? "Consolidado {$consolidado->numero}" : 'Sin consolidar',
    'title' => 'Nueva entrada',
])
    <form action="{{ route('entradas.store') }}" method="post" autocomplete="off">
        @csrf

        <div class="mb-3">
            <label for="input-numero" class="form-label small">Número</label>
            <input name="numero" value="{{ old('numero', $entrada->numero) }}" id="input-numero" type="text" class="form-control {{ bootstrap_isInputInvalid('numero', $errors) }}" autofocus required>
            @include('@.bootstrap.invalid-input-message', ['name' => 'numero'])
        </div>

        @if( $consolidado )
        <div class="mb-3">
            <label for="read-cliente" class="form-label small">Cliente</label>
            <div class="form-control bg-light">{{ $consolidado->cliente->nombre }} ({{ $consolidado->cliente->alias }})</div>
        </div>
        <input name="consolidado" value="{{ $consolidado->id }}" type="hidden">

        @else
        <div class="mb-3">
            <label for="selectCliente" class="form-label small">Cliente</label>
            <select name="cliente" id="selectCliente" class="form-select {{ bootstrap_isInputInvalid('cliente', $errors) }}" required>
                <option disabled selected></option>
                @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}" {{ toggleSelected($cliente->id, old('cliente', $entrada->cliente_id)) }}>{{ $cliente->nombre }} ({{ $cliente->alias }})</option>
                @endforeach
            </select>
            @include('@.bootstrap.invalid-input-message', ['name' => 'cliente'])
        </div>

        @endif
        
        <div class="mb-3">
            <label for="textarea-contenido" class="form-label small">Contenido</label>
            <textarea name="contenido" id="textarea-contenido" cols="30" rows="5" class="form-control {{ bootstrap_isInputInvalid('contenido', $errors) }}">{{ old('contenido', $entrada->contenido) }}</textarea>
            @include('@.bootstrap.invalid-input-message', ['name' => 'contenido'])
        </div>
        <br>
        
        <div class="dropdown d-inline-block">
            <button type="button" class="btn btn-primary dropdown-toggle" id="dropdownMenuButtonSave" data-bs-toggle="dropdown" aria-expanded="false">
                <span>Guardar entrada</span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonSave">
                <li>
                    <span class="dropdown-header">Posteriormente</span>
                </li>
                <li>
                    <button type="submit" class="dropdown-item" name="siguiente" value="crear">Crear entrada</button>
                </li>
                <li>
                    <button type="submit" class="dropdown-item" name="siguiente" value="finalizar">Finalizar</button>
                </li>
            </ul>
        </div>
        <a href="{{ $route_cancel }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
@endcomponent

@endsection
