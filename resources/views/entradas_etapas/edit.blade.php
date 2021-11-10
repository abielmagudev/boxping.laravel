@extends('app')
@section('content')

@component('@.bootstrap.card', [
    'pretitle' => $entrada->numero,
    'title' => 'Editar etapa',
])
    <div class="mb-3">
        <label class="form-label small">Etapa</label>
        <div class="form-control bg-light">{{ $etapa->nombre }}</div>
    </div>

    <form action="{{ route('entradas.etapas.update', [$entrada, $etapa]) }}" method="post" autocomplete="off">
        @method('patch')
        @csrf
        @includeWhen($etapa->hasTarea('peso'),'entradas_etapas._medidas_peso')
        @includeWhen($etapa->hasTarea('volumen'),'entradas_etapas._medidas_volumen')
        @include('entradas_etapas._zonas')
        @include('entradas_etapas._alertas')
        <br>

        @component('@.bootstrap.grid-left-right')
            @slot('left')
            <button class="btn btn-warning" type="submit" name="etapa" value="{{ $etapa->id }}">Actualizar etapa</button>
            <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-secondary">Regresar</a>
            @endslot
            @slot('right')
            @include('@.partials.modal-confirm-delete.trigger', ['only' => 'text'])
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>

@include('@.partials.block-modifiers.content', ['model' => $etapa])

@component('@.partials.modal-confirm-delete.modal', [
    'route' => route('entradas.etapas.destroy', [$entrada, $etapa]),
    'category' => 'etapa',
    'name' => $etapa->nombre,
    'is_hard' => true,
])
    <p class="small text-uppercase">Entrada {{ $entrada->numero }}</p>
@endcomponent

@endsection
