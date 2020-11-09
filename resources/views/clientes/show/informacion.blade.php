<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <div>Cliente</div>
        <div>
            <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning btn-sm">
                <b>e</b>
            </a>
        </div>
    </div>
    <div class="card-body">
        <p>
            <span class="d-block">{{ $cliente->nombre }} ({{ $cliente->alias}})</span>
            <small class="text-muted">Nombre</small>
        </p>
        <p>
            <span class="d-block">{{ $cliente->contacto }}</span>
            <small class="text-muted">Contacto</small>
        </p>
        <p>
            <span class="d-block">{{ $cliente->telefono }}</span>
            <small class="text-muted">Teléfono</small>
        </p>
        <p>
            <span class="d-block">{{ $cliente->correo_electronico }}</span>
            <small class="text-muted">Correo electrónico</small>
        </p>
        <p>
            <span class="d-block">{{ $cliente->direccion }}</span>
            <small class="text-muted">Dirección</small>
        </p>
        <p>
            <span class="d-block">{{ $cliente->localidad }}</span>
            <small class="text-muted">Localidad</small>
        </p>
        @if( $cliente->notas )
        <p>
            <span class="d-block">{{ $cliente->notas }}</span>
            <small class="text-muted">Notas</small>
        </p>
        @endif
        <p>
            <span class="d-block">{{ $cliente->creator->name }}</span>
            <span class="d-block">{{ $cliente->created_at }}</span>
            <small class="text-muted">Creado</small>
        </p>
        <p>
            <span class="d-block">{{ $cliente->updater->name }}</span>
            <span class="d-block">{{ $cliente->updated_at }}</span>
            <small class="text-muted">Actualizado</small>
        </p>
    </div>
</div>
