<?php

$modal = (object) [
    'id' => 'modalComentarios',
];

?>

@include('@.bootstrap.modal-trigger', [
    'modal_id' => $modal->id,
    'classes' => 'btn btn-sm btn-outline-primary',
    'text' => $graffiti->design('chat-fill')->svg(),
])

<!-- Modal comentarios -->
@component('@.bootstrap.modal', [
  'id' => $modal->id,
  'header_settings' => [
      'title' => 'Conversación',
  ],
  'footer_settings' => [
      'close' => false
  ],
])
    @slot('header_settins["title"]')
    <span class="badge text-dark" style="background-color:#ddd">{{ $entrada->comentarios->count() }}</span>
    @endslot

    @slot('body')
    <ul class="nav nav-tabs nav-fill">
        <li class="nav-item">
            <a class="nav-link {{ $entrada->hasComentarios(true) ? 'active' : 'disabled' }}" id="comentariosTab" data-bs-toggle="tab" href="#contentComentarios" role="tab" aria-controls="contentComentarios" aria-selected="true">
                <span>Comentarios</span>
                <span class="badge text-dark" style="background-color:#ddd">{{ $entrada->comentarios->count() }}</span>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link {{ $entrada->hasComentarios(true) ?: 'active' }}" id="comentarTab" data-bs-toggle="tab" href="#contentComentar" role="tab" aria-controls="contentComentar" aria-selected="false">
                <span>Comentar</span>
            </a>
        </li>
    </ul>

    <div class="tab-content" id="tabsContentComentarios">

        {{-- Comentarios --}}
        <div class="tab-pane fade {{ ! $entrada->hasComentarios(true) ?: 'show active' }} overflow-scroll p-2" id="contentComentarios" role="tabpanel" aria-labelledby="contentComentariosTab" style="max-height:70vh">
            <ul class="list-group list-group-flush">
            @foreach($entrada->comentarios as $comentario)
            <li class="list-group-item">
                <small class="text-muted">{{ $comentario->creator->name ?? 'Desconocido' }}</small>
                <p class='fst-italic'>{!! $comentario->contenido_html !!}</p>
                <small class="d-block text-end text-muted">{{ $comentario->fecha_hora_creado }}</small>
            </li>
            @endforeach
            </ul>
        </div>

        {{-- Nuevo comentario --}}
        <div class="tab-pane fade {{ $entrada->hasComentarios(true) ?: 'show active' }} p-2" id="contentComentar" role="tabpanel" aria-labelledby="contentComentarTab">
            <form action="{{ route('comentarios.store') }}" method="post" atuocomplete="off" class="mt-2">
                @csrf
                <div class="mb-1">
                    <label for="textarea-contenido" class="form-label text-muted small">Escribe tu comentario</label>
                    <textarea name="contenido" id="textarea-contenido" cols="30" rows="5" class="form-control" required></textarea>
                </div>
                <input type="hidden" name="entrada" value="<?= $entrada->id ?>">
                <button class="btn btn-success w-100" type="submit">Guardar comentario</button>
            </form>
        </div>
    </div>

    @endslot

@endcomponent
