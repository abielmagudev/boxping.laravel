@extends('app')
@section('content')

<p class="text-secondary">
    <span class="me-1">Entrada</span>
    <b>{{ $entrada->numero }}</b>
</p>

@component('@.bootstrap.card', [
    'title' => 'Editar etapa',
])
    <div class="mb-3">
        <label class="form-label small">Etapa</label>
        <div class="form-control bg-light">{{ $etapa->nombre }}</div>
    </div>

    <form action="{{ route('entradas.etapas.update', [$entrada, $etapa]) }}" method="post" autocomplete="off">
        @method('patch')
        @csrf
    
        {{-- Medidas de peso --}}
        @includeWhen($etapa->hasTarea('peso'),'entradas_etapas._medidas_peso')
        
        {{-- Medidas de volumen --}}
        @includeWhen($etapa->hasTarea('volumen'),'entradas_etapas._medidas_volumen')

        {{-- Zonas --}}
        @include('entradas_etapas._zonas')

        {{-- Alertas --}}
        @include('entradas_etapas._alertas')
        <br>

        @component('@.bootstrap.grid-left-right')
            @slot('left')
                <button class="btn btn-warning" type="submit" name="etapa" value="{{ $etapa->id }}">Actualizar etapa</button>
                <a href="{{ route('entradas.show', [$entrada,'etapas']) }}" class="btn btn-secondary">Regresar</a>
            @endslot

            @slot('right')
                @component('@.partials.modal-delete-confirm', [
                    'route' => route('entradas.etapas.destroy', [$entrada, $etapa]),
                    'destroy' => true,
                ])
                    <div class="text-center">
                        <p class="m-0 lead text-muted">Se eliminará etapa de la entrada</p>
                        <p class="m-0 lead fw-bold">{{ $etapa->nombre }}</p>
                        <p class="m-0 px-5 small">{{ $entrada->numero }}</p>
                    </div>
                @endcomponent
            @endslot
        @endcomponent
    </form>
@endcomponent
<br>

{{-- @include('@.partials.block-modifiers', ['model' => $etapa]) --}}

@endsection
