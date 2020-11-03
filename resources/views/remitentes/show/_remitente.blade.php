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
            <span>{{ $remitente->nombre }}</span>
            <small class="d-block text-muted">Nombre</small>
        </p>
        <p>
            <span>{{ $remitente->direccion }}</span>
            <small class="d-block text-muted">Dirección</small>
        </p>
        <p>
            <span>{{ $remitente->codigo_postal }}</span>
            <small class="d-block text-muted">Código postal</small>
        </p>
        <p>
            <span>{{ $remitente->localidad }}</span>
            <small class="d-block text-muted">Localidad</small>
        </p>
        <p>
            <span>{{ $remitente->telefono }}</span>
            <small class="d-block text-muted">Teléfono</small>
        </p>
        <p>
            <span class="d-block">{{ $remitente->creator->name }}</span>
            <span class="d-block">{{ $remitente->created_at }}</span>
            <small class="d-block text-muted">Creado</small>
        </p>
        <p>
            <span class="d-block">{{ $remitente->updater->name }}</span>
            <span class="d-block">{{ $remitente->updated_at }}</span>
            <small class="d-block text-muted">Actualizado</small>
        </p>
    </div>
</div>
