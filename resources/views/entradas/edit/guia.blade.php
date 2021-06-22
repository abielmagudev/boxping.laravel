@extends('app')
@section('content')

@include('@.partials.page-header', [
    'pretitle' => "Entrada {$entrada->numero}",
    'title' => 'Editar guía',
])

@component('@.bootstrap.card')
    @slot('body')
    <form action="{{ route('entradas.update', $entrada) }}" method="post" autocomplete="off">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="input-numero" class="form-label small">Número de entrada</label>
            <input name="numero" value="{{ old('numero', $entrada->numero) }}" id="input-numero" type="text" class="form-control" autofocus required>
        </div>
        <div class="mb-3">
            <label for="input-consolidado" class="form-label small">Número de consolidado</label>
            <input name="consolidado_numero" value="{{ $consolidado->numero ?? '' }}" placeholder="Sin consolidar" type="text" id="input-consolidado" class="form-control">
        </div>
        <div class="mb-1">
            <label for="select-cliente" class="form-label small">Cliente</label>
            @if( $consolidado )
            <div class="form-control bg-light">
                <span>{{ $entrada->cliente->nombre }} ({{ $entrada->cliente->alias }})</span>
            </div>
            <input type="hidden" name="cliente" value="{{ $entrada->cliente->id }}">

            @else
            <select name="cliente" id="select-cliente" class="form-select">
                @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}" {{ toggleSelected($cliente->id, old('cliente', $entrada->cliente_id)) }}>{{ $cliente->nombre }} ({{ $cliente->alias }})</option>
                @endforeach
            </select>

            @endif
        </div>
        <div class="form-check mb-3">
            <input name="cliente_alias_numero" value="1" id="checkbox-cliente-alias-numero" type="checkbox" class="form-check-input" {{ toggleChecked(1, $entrada->cliente_alias_numero) }}>
            <label for="checkbox-cliente-alias-numero" class="form-check-label small">Alias del cliente al comienzo del número de entrada.</label>
        </div>
        <div class="mb-3">
            <label for="textarea-contenido" class="form-label small">Contenido</label>
            <textarea name="contenido" id="textarea-contenido" cols="30" rows="5" class="form-control">{{ old('contenido', $entrada->contenido) }}</textarea>
        </div>
        <br>

        <button class="btn btn-warning" type="submit" name="actualizar" value="guia">Actualizar guía</button>
        <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-secondary">Regresar</a>
    </form>
    @endslot

    @slot('footer')
    @include('@.partials.modifiers-block', [
        'model' => $entrada,
    ])
    @endslot
@endcomponent
<br>

<div class="text-end">
@component('@.partials.confirm-delete.bundle', [
    'route' => route('entradas.destroy', $entrada),
    'text' => 'Eliminar entrada',
])
    @slot('content')
    <p class="lead">¿Deseas eliminar entrada <br>{{ $entrada->numero }}?</p>
    <p class="text-muted small">
        @if( ! is_null($entrada->consolidado_id) )
        <span>Consolidado {{ $entrada->consolidado->numero }}</span>

        @else
        <span>Sin consolidado</span>

        @endif
    </p>
    @endslot
@endcomponent
</div>
<br>

@endsection
