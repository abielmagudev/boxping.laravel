@extends('app')
@section('content')

@component('@.bootstrap.header', [
    'pretitle' => "Entrada {$entrada->numero}",
    'title' => 'Editar etapa',
])
@endcomponent

@component('@.bootstrap.card')
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
    @component('@.partials.block-modifiers', [
        'model' => $etapa
    ])
    @endcomponent
    @endslot
    
@endcomponent
<br>

@component('@.partials.modal-confirm-delete', [
    'route' => route('entrada.etapas.destroy', [$entrada, $etapa]),
    'text' => 'Eliminar etapa',
])
    @slot('content')    
    <p class="lead m-0">¿Deseas eliminar la etapa <b>{{ $etapa->nombre }}</b>?</p>
    <p class="small">De la entrada {{ $entrada->numero }}</p>
    @endslot
@endcomponent
<br>

@endsection
