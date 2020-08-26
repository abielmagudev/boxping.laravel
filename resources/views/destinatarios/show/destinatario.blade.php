<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <span>Destinatario</span>
        </div>
        <div>
            <a href="{{ route('destinatarios.edit', $destinatario) }}" class="btn btn-warning btn-sm">e</a>
        </div>
    </div>
    <div class="card-body">
        <p>
            <small class="d-block text-muted">Nombre</small>
            <span>{{ $destinatario->nombre }}</span>
        </p>
        <p>
            <small class="d-block text-muted">Dirección</small>
            <span>{{ $destinatario->direccion }}</span>
        </p>
        <p>
            <small class="d-block text-muted">Código postal</small>
            <span>{{ $destinatario->codigo_postal }}</span>
        </p>
        <p>
            <small class="d-block text-muted">Localidad</small>
            <span>{{ $destinatario->localidad }}</span>
        </p>
        <p>
            <small class="d-block text-muted">Referencias</small>
            <span>{{ $destinatario->referencias }}</span>
        </p>
        <p>
            <small class="d-block text-muted">Teléfono</small>
            <span>{{ $destinatario->telefono }}</span>
        </p>
        <p>
            <small class="d-block text-muted">Creado</small>
            <span class="d-block">{{ $destinatario->creater->name }}</span>
            <span class="d-block">{{ $destinatario->created_at }}</span>
        </p>
        <p>
            <small class="d-block text-muted">Actualizado</small>
            <span class="d-block">{{ $destinatario->updater->name }}</span>
            <span class="d-block">{{ $destinatario->updated_at }}</span>
        </p>
    </div>
</div>