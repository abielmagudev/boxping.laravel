@component('components.header')
    @slot('title', $entrada->numero)
    @slot('subtitle', 'Entrada')
    @slot('options')
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-comentarios">
        <span class="lead d-inline-block d-md-none align-middle me-2">{!! $icons->chat_left_text_fill !!}</span>
        <span class="d-none d-md-inline-block me-1">Comentarios</span>
        <span class="badge rounded-pill border border-white">{{ $comentarios->count() }}</span>
    </button>
    @endslot
@endcomponent
