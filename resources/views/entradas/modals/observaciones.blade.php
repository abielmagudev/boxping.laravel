<!-- Modal -->
<div class="modal fade" id="entradaObservacionesModal" tabindex="-1" aria-labelledby="entradaObservacionesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header border-0">
        <p class="modal-title" id="entradaObservacionesModalLabel">{{ $entrada->alias_numero ?? $entrada->numero }}</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="card-header bg-transparent">
        <ul class="nav nav-tabs nav-fill card-header-tabs" id="tabsObservaciones" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link {{ $entrada->observaciones->count() > 0 ? 'active' : 'disabled' }}" id="observaciones-tab" data-toggle="tab" href="#observaciones" role="tab" aria-controls="observaciones" aria-selected="true">Observaciones</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link {{ $entrada->observaciones->count() == 0 ? 'active' : '' }}" id="nueva-observacion-tab" data-toggle="tab" href="#nueva-observacion" role="tab" aria-controls="nueva-observacion" aria-selected="false">Nueva observación</a>
          </li>
        </ul>
      </div>

      <div class="modal-body">
        <div class="tab-content" id="tabsContentObservaciones">

          <!-- Lista de observaciones -->
          <div class="tab-pane fade {{ $entrada->observaciones->count() > 0 ? 'show active' : '' }}" id="observaciones" role="tabpanel" aria-labelledby="observaciones-tab">
            <ul class="list-group list-group-flush">
                <?php $observaciones = $entrada->observaciones->sortByDesc('id') ?>
                @foreach($observaciones as $observacion)
                <li class="list-group-item">
                    <div class="text-muted small">
                      <div class="float-right">{{ $observacion->updated_at }}</div>
                      <div class="float-left">{{ $observacion->creator->name ?? 'Unkown' }}</div>
                    </div>
                    <br>
                    <p class="text-monospace small">{{ $observacion->contenido }}</p>
                </li>
                @endforeach
            </ul>
          </div>
          
          <!-- Nueva observacion -->
          <div class="tab-pane fade {{ $entrada->observaciones->count() == 0 ? 'show active' : '' }}" id="nueva-observacion" role="tabpanel" aria-labelledby="nueva-observacion-tab">
            <form action="{{ route('observaciones.store') }}" method="post" atuocomplete="off" class="mt-3">
                @csrf
                <input type="hidden" name="entrada" value="{{ $entrada->id }}">
                <div class="form-group">
                    <label for="textarea-contenido" class="">Escribe la observación</label>
                    <textarea name="contenido" id="textarea-contenido" cols="30" rows="5" class="form-control" required></textarea>
                </div>
                <button class="btn btn-success btn-block" type="submit">Agregar observación</button>
            </form>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>