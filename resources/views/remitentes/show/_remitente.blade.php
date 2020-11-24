<div class="card">
    @component('components.card-header-with-link', [
        'title' => 'Remitente',
        'tooltip' => 'Editar',
        'link' => route('remitentes.edit', $remitente),
        'color' => 'warning',
    ])

        @slot('content')
        <b>e</b>
        @endslot
    @endcomponent
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
