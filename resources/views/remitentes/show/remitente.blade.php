<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <span>Remitente</span>
        </div>
        <div>
            <a href="{{ route('remitentes.edit', $remitente) }}" class="btn btn-warning btn-sm">e</a>
        </div>
    </div>
    <div class="card-body">
        <p>
            <small class="d-block text-muted">Nombre</small>
            <span>{{ $remitente->nombre }}</span>
        </p>
        <p>
            <small class="d-block text-muted">Dirección</small>
            <span>{{ $remitente->direccion }}</span>
        </p>
        <p>
            <small class="d-block text-muted">Código postal</small>
            <span>{{ $remitente->codigo_postal }}</span>
        </p>
        <p>
            <small class="d-block text-muted">Localidad</small>
            <span>{{ $remitente->localidad }}</span>
        </p>
        <p>
            <small class="d-block text-muted">Teléfono</small>
            <span>{{ $remitente->telefono }}</span>
        </p>
        <p>
            <small class="d-block text-muted">Creado</small>
            <span class="d-block">{{ $remitente->creater->name }}</span>
            <span class="d-block">{{ $remitente->created_at }}</span>
        </p>
        <p>
            <small class="d-block text-muted">Actualizado</small>
            <span class="d-block">{{ $remitente->updater->name }}</span>
            <span class="d-block">{{ $remitente->updated_at }}</span>
        </p>
    </div>
</div>