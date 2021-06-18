<!-- Modal comentarios -->
@component('@.bootstrap.modal', [
  'id' => 'modal-comentarios',
  'header_close' => true,
])

  @slot('body')
  <br>
  <ul class="nav nav-pills nav-fill">
    <li class="nav-item">
      <a class="nav-link {{ $comentarios->count() > 0 ? 'active' : 'disabled' }}" id="comentarios-tab" data-bs-toggle="tab" href="#content-comentarios" role="tab" aria-controls="content-comentarios" aria-selected="true">Comentarios</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link {{ $comentarios->count() == 0 ? 'active' : '' }}" id="nueva-observacion-tab" data-bs-toggle="tab" href="#content-nuevo-comentario" role="tab" aria-controls="content-nuevo-comentario" aria-selected="false">Nuevo comentario</a>
    </li>
  </ul>

  <div class="tab-content mt-3" id="tabsContentComentarios">

    <!-- Lista de comentarios -->
    <div class="tab-pane fade {{ $comentarios->count() > 0 ? 'show active' : '' }} overflow-auto" id="content-comentarios" role="tabpanel" aria-labelledby="content-comentarios-tab">
      <ul class="list-group list-group-flush">
        @foreach($comentarios as $comentario)
        <li class="list-group-item px-0">
          <p class="small m-0">
            <span class="text-muted">{{ $comentario->creator->name ?? 'Usuario' }}</span>
          </p>
          <p class='lead'>{{ $comentario->contenido }}</p>
          <p class="text-end text-muted small m-0">{{ $comentario->created_at }}</p>
        </li>
        @endforeach
      </ul>
    </div>

    <!-- Nuevo comentario -->
    <div class="tab-pane fade {{ $comentarios->count() == 0 ? 'show active' : '' }}" id="content-nuevo-comentario" role="tabpanel" aria-labelledby="content-nuevo-comentario-tab">
      <form action="{{ route('comentarios.store', $entrada) }}" method="post" atuocomplete="off">
          @csrf
          <div class="mb-1">
              <label for="textarea-contenido" class="form-label small">Escribe tu comentario</label>
              <textarea name="contenido" id="textarea-contenido" cols="30" rows="5" class="form-control" required></textarea>
          </div>
          <button class="btn btn-success w-100" type="submit">Guardar comentario</button>
      </form>
    </div>
  </div>
  @endslot
  
@endcomponent
