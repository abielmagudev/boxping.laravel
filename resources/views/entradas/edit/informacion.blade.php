@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'pretitle' => $entrada->numero,
    'title' => 'Editar información',
])
    <form action="{{ route('entradas.update', $entrada) }}" method="post" autocomplete="off">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="input-numero" class="form-label small">Número de entrada</label>
            <input name="numero" value="{{ old('numero', $entrada->numero) }}" id="input-numero" type="text" class="form-control <?= bootstrap_isInputInvalid('numero', $errors) ?>" autofocus required>
            @include('@.bootstrap.invalid-input-message', ['name' => 'numero'])
        </div>
        <div class="mb-3">
            <label for="input-consolidado" class="form-label small">Número de consolidado</label>
            <input name="consolidado_numero" value="{{ $consolidado->numero ?? '' }}" placeholder="Sin consolidado" type="text" id="input-consolidado" class="form-control <?= bootstrap_isInputInvalid('consolidado_numero', $errors) ?>"">
            @include('@.bootstrap.invalid-input-message', ['name' => 'consolidado_numero'])
        </div>
        <div class="mb-3">
            <label for="select-cliente" class="form-label small">Cliente</label>
            @if( $entrada->hasConsolidado() )
            <div class="form-control bg-light">
                <span>{{ $entrada->consolidado->cliente->nombre }} ({{ $entrada->consolidado->cliente->alias }})</span>
            </div>
            <input type="hidden" name="cliente" value="{{ $entrada->consolidado->cliente_id }}">

            @else
            <select name="cliente" id="select-cliente" class="form-select <?= bootstrap_isInputInvalid('cliente', $errors) ?>" required>
                @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}" {{ toggleSelected($cliente->id, old('cliente', $entrada->cliente_id)) }}>{{ $cliente->nombre }} ({{ $cliente->alias }})</option>
                @endforeach
            </select>
            @include('@.bootstrap.invalid-input-message', ['name' => 'cliente'])

            @endif
        </div>
        <div class="mb-3">
            <label for="textarea-contenido" class="form-label small">Contenido</label>
            <textarea name="contenido" id="textarea-contenido" cols="30" rows="5" class="form-control <?= bootstrap_isInputInvalid('contenido', $errors) ?>">{{ old('contenido', $entrada->contenido) }}</textarea>
            @include('@.bootstrap.invalid-input-message', ['name' => 'contenido'])
        </div>
        <br>
        @component('@.bootstrap.grid-left-right')
            @slot('left')
            <button class="btn btn-warning" type="submit" name="actualizar" value="informacion">Actualizar información</button>
            <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-secondary">Regresar</a>
            @endslot

            @slot('right')
            @include('@.partials.modal-confirm-delete.trigger', ['only' => 'text'])
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>

@include('@.partials.block-modifiers.content', ['model' => $entrada])

@component('@.partials.modal-confirm-delete.modal', [
    'route' => route('entradas.destroy', $entrada),
    'category' => 'entrada',
    'name' => $entrada->numero,
    'is_hard' => true,
])
    @if( ! is_null($entrada->consolidado_id) )
    <p class="small text-dark text-uppercase">Consolidado <em>{{ $entrada->consolidado->numero }}</em></p>

    @endif
@endcomponent

@endsection
