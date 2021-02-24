@extends('app')
@section('content')

@component('components.header', [
    'title' => $entrada->numero,
    'subtitle' => 'Entrada',
])
@endcomponent

@component('components.card', [
    'header_title' => 'Editar etapa'
])
    @slot('body')
    <div class="mb-3">
        <label class="form-label small">Etapa</label>
        <div class="form-control bg-light">{{ $etapa->nombre }}</div>
    </div>

    <form action="{{ route('entrada.etapas.update', [$entrada, $etapa]) }}" method="post" autocomplete="off">
        @method('patch')
        @csrf
        @include('entradas.etapas._medidas')
        @include('entradas.etapas._zonas')
        @include('entradas.etapas._alertas')
        <br>
        <button class="btn btn-warning" type="submit" name="etapa" value="{{ $etapa->id }}">Actualizar etapa</button>
        <a href="{{ route('entradas.show', $entrada) }}" class="btn btn-secondary">Regresar</a>
    </form>
    @endslot

    @slot('footer')
    @component('partials.modal-confirm-delete', [
        'route' => route('entrada.etapas.destroy', [$entrada, $etapa]),
        'trigger_align' => 'right',
        'trigger_text' => 'Eliminar etapa',
    ])
        @slot('body')
        <p>Se eliminará la etapa <span class="fw-bold">{{ $etapa->nombre }}</span> <br> de la entrada <span class="fw-bold">{{ $entrada->numero }}</span></p>
        @endslot
    @endcomponent
    @endslot
    
@endcomponent
<br>

@endsection
