<!-- Modal comentarios -->
@component('@.bootstrap.modal', [
  'id' => 'modalComentarios',
  'header_close' => true,
  'header_classes' => 'border-0',
])
  <ul class="nav nav-tabs nav-fill">
    <li class="nav-item">
      <a class="nav-link {{ $entrada->hasComentarios(true) ? 'active' : 'disabled' }}" id="comentariosTab" data-bs-toggle="tab" href="#contentComentarios" role="tab" aria-controls="contentComentarios" aria-selected="true">
        <span>Comentarios</span>
        <span class="badge text-dark" style="background-color:#ddd">{{ $entrada->comentarios->count() }}</span>
      </a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link {{ $entrada->hasComentarios(true) ?: 'active' }}" id="nueva-comentarioTab" data-bs-toggle="tab" href="#contentNuevoComentario" role="tab" aria-controls="contentNuevoComentario" aria-selected="false">
        <span>Nuevo</span> <span class="d-none d-md-inline-block">comentario</span>
      </a>
    </li>
  </ul>

  <div class="tab-content mt-3" id="tabsContentComentarios">

    <!-- Lista de comentarios -->
    <div class="tab-pane fade {{ ! $entrada->hasComentarios(true) ?: 'show active' }} overflow-scroll" id="contentComentarios" role="tabpanel" aria-labelledby="contentComentariosTab" style="max-height:70vh">
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
    <br>

    <!-- Nuevo comentario -->
    <div class="tab-pane fade {{ $entrada->hasComentarios(true) ?: 'show active' }}" id="contentNuevoComentario" role="tabpanel" aria-labelledby="contentNuevoComentarioTab">
      <form action="{{ route('comentarios.store', $entrada) }}" method="post" atuocomplete="off">
          @csrf
          <div class="mb-1">
              <label for="textarea-contenido" class="form-label text-muted small">Escribe tu comentario</label>
              <textarea name="contenido" id="textarea-contenido" cols="30" rows="5" class="form-control" required></textarea>
          </div>
          <button class="btn btn-success w-100" type="submit">Guardar comentario</button>
      </form>
      <br>
    </div>
  </div>  
@endcomponent