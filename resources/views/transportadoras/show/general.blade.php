<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <div>Transportadora</div>
        <div>
            <a href="{{ route('transportadoras.edit', $transportadora) }}" class="btn btn-warning btn-sm">
                <b>e</b>
            </a>
        </div>
    </div>
    <div class="card-body">
        <p>
            <span>{{ $transportadora->nombre }}</span>
            <small class="d-block text-muted">Nombre</small>
        </p>
        <p>
            <span>{{ $transportadora->web }}</span>
            <small class="d-block text-muted">Sitio web</small>
        </p>
        <p>
            <span>{{ $transportadora->telefono }}</span>
            <small class="d-block text-muted">Teléfono</small>
        </p>
        <p>
            <span>{{ $transportadora->notas }}</span>
            <small class="d-block text-muted">Notas</small>
        </p>
    </div>
</div>