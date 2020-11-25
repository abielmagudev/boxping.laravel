<div class="card">
    @component('components.card-header-with-link', [
        'title' => 'Transportadora',
        'tooltip' => 'Editar',
        'link' => route('transportadoras.edit', $transportadora),
        'color' => 'warning'
    ])

        @slot('content')
        <b>e</b>
        @endslot
    @endcomponent
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
        <p>
            <span>{{ $transportadora->creator->name }}</span>
            <br>
            <span>{{ $transportadora->created_at }}</span>
            <br>
            <small class="d-block text-muted">Creado</small>
        </p>
        <p>
            <span>{{ $transportadora->updater->name }}</span>
            <br>
            <span>{{ $transportadora->updated_at }}</span>
            <br>
            <small class="d-block text-muted">Actualizado</small>
        </p>
    </div>
</div>
