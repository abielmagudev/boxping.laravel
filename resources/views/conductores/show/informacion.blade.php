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
    </div>
</div>
