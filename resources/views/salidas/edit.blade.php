@extends('app')
@section('content')

<p class="text-end">
    <a href="{{ route('salidas.index') }}" class="link-primary text-decoration-none small"> &laquo; Salidas</a>
</p>

@component('@.bootstrap.card', [
    'pretitle' => $salida->entrada->numero,
    'title' => 'Editar salida',
])
    <form action="{{ route('salidas.update', $salida) }}" method="post" autocomplete="off">
        @method('put')
        @include('salidas._save')
        @component('@.bootstrap.grid-left-right')
            @slot('left')
            <button class="btn btn-warning" type="submit">Actualizar salida</button>
            <a href="{{ route('entradas.show', $salida->entrada) }}" class="btn btn-secondary">Regresar</a>
            @endslot

            @slot('right')
            @include('@.partials.modal-confirm-delete.trigger', ['only' => 'text'])
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>

@include('@.partials.block-modifiers.content', ['model' => $salida])

@component('@.partials.modal-confirm-delete.modal', [
    'route' => route('salidas.destroy', $salida),
    'category' => 'salida',
    'name' => 'de entrada ' . $salida->entrada->numero,
    'is_hard' => true,
])
    <div class="row g-1 py-3 border border-danger rounded small">
        <div class="col-6 text-end">Transportadora</div>
        <div class="col-6 text-start text-dark">{{ $salida->transportadora->nombre }}</div>
        <div class="col-6 text-end">Rastreo</div>
        <div class="col-6 text-start text-dark">{{ $salida->rastreo }}</div>
        <div class="col-6 text-end">Confirmación</div>
        <div class="col-6 text-start text-dark">{{ $salida->confirmacion }}</div>
    </div>
@endcomponent

@endsection
