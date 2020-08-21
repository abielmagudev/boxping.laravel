<div class="tab-pane fade" id="remitente" role="tabpanel" aria-labelledby="remitente-tab">
    @if( is_object($entrada->remitente) )
    <p>
        <small class="d-block text-muted">Nombre</small>
        <span>{{ $entrada->remitente->nombre }}</span>
    </p>
    <p>
        <small class="d-block text-muted">Dirección</small>
        <span>{{ $entrada->remitente->direccion }}</span>
    </p>
    <p>
        <small class="d-block text-muted">Código postal</small>
        <span>{{ $entrada->remitente->codigo_postal }}</span>
    </p>
    <p>
        <small class="d-block text-muted">Localidad</small>
        <span>{{ $entrada->remitente->localidad }}</span>
    </p>
    <p>
        <small class="d-block text-muted">Teléfono</small>
        <span>{{ $entrada->remitente->telefono }}</span>
    </p>
    <p>
        <small class="d-block text-muted">Actualizado</small>
        <span>{{ $entrada->remitente->updater->name }}</span>
        <br>
        <span>{{ $entrada->remitente->updated_at }}</span>
    </p>
    <br>

    <div class="text-right">
        <a href="{{ route('remitentes.edit', $entrada->remitente) }}" class="btn btn-warning btn-sm">Editar remitente</a>
    </div>

    @else
    <br>
    <p class="text-center">
        <a href="{{ route('remitentes.create', ['entrada' => $entrada->id]) }}" class="btn btn-outline-success">Agregar remitente a la entrada</a>
    </p>

    @endif
</div>