<div class="card">
    @component('components.card-header-with-link', [
        'title' => 'Conductor',
        'link'  => route('conductores.edit', $conductor),
        'color' => 'warning',
        'tooltip' => 'Editar',
    ])
        @slot('content')
        <b>e</b>
        @endslot
    @endcomponent
    <div class="card-body">
        <p>
            <span>{{ $conductor->nombre }}</span>
            <br>
            <small class="text-muted">Nombre</small>
        </p>
        <p>
            <span>{{ $conductor->creator->name }}</span>
            <br>
            <span>{{ $conductor->created_at }}</span>
            <br>
            <small class="text-muted">Creado</small>
        </p>
        <p>
            <span>{{ $conductor->updater->name }}</span>
            <br>
            <span>{{ $conductor->updated_at }}</span>
            <br>
            <small class="text-muted">Actualizado</small>
        </p>
    </div>
</div>
