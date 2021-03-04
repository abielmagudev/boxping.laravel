@extends('app')
@section('content')
@component('components.card', [
    'header_title' => 'Editar código',
])
    @slot('body')
    <form action="{{ route('codigosr.update', $codigor) }}" method="post" autocomplete="off">
        @method('patch')
        @include('codigosr._save')
        <br>
        <button class="btn btn-warning" type="submit">Actualizar código</button>
        <a href="{{ route('codigosr.index') }}" class="btn btn-secondary">Regresar</a>
    </form>
    @endslot

    @slot('footer')
    @component('partials.modal-confirm-delete', [
        'route' => route('codigosr.destroy', $codigor),
        'trigger_text' => 'Eliminar código',
        'trigger_align' => 'right',
    ])
        @slot('body')
        <p class="text-muted">
            <span class="">Se eliminará el código</span>
            <span class="fw-bold">{{ $codigor->nombre }}</span>
        </p>
        <p class="small">{{ $codigor->descripcion }}</p>
        @endslot
    @endcomponent
    @endslot
@endcomponent

@component('partials.section-modifiers', [
    'concept' => $codigor,
])
@endcomponent 

@endsection
