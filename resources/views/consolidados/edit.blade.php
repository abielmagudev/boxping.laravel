@extends('app')
@section('content')
@component('components.card')
    @slot('header_title', 'Editar consolidado')
    @slot('body')
    <form action="{{ route('consolidados.update', $consolidado) }}" method="post" autocomplete="off">
        @method('patch')
        @include('consolidados._save')
        <button class="btn btn-warning" type="submit">Actualizar consolidado</button>
        <a href="{{ route('consolidados.show', $consolidado) }}" class="btn btn-secondary">Regresar</a>
    </form>
    @endslot
    @slot('footer')
        @component('partials.modal-confirm-delete')
            @slot('route', route('consolidados.destroy', $consolidado))
            @slot('trigger_text', 'Eliminar consolidado')
            @slot('trigger_align', 'right')
            @slot('body')
            <p class="text-center">
                <span>Se eliminará consolidado</span>
                <br>
                <span class="lead fw-bold">{{ $consolidado->numero }}</span>
                <br>
                <span class="small">{{ $consolidado->entradas->count() }} entradas</span>
            </p>
            @endslot
        @endcomponent
    @endslot
@endcomponent

@component('partials.section-modifiers', [
    'created_by' => $consolidado->creator->name,
    'created_at' => $consolidado->created_at,
    'updated_by' => $consolidado->updater->name,
    'updated_at' => $consolidado->updated_at,
])
@endcomponent
@endsection
