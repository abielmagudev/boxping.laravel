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
    </div>
</div>
