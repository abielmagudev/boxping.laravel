<div class="card">
    @component('components.card-header-with-link', [
        'title'   => 'Código de reempacado',
        'link'    => route('codigosr.edit', $codigor),
        'color'   => 'warning',
        'tooltip' => 'Editar',
    ])
        @slot('content')
        <b>e</b>
        @endslot
    @endcomponent
    <div class="card-body">
        <p>
            <span>{{ $codigor->nombre }}</span>
            <br>
            <small class="text-muted">Nombre</small>
        </p>
        <p>
            <span>{{ $codigor->descripcion }}</span>
            <br>
            <small class="text-muted">Descripción</small>
        </p>
        <p>
            <span>{{ $codigor->creator->name }}</span>
            <br>
            <span>{{ $codigor->created_at }}</span>
            <br>
            <small class="text-muted">Creado</small>
        </p>
        <p>
            <span>{{ $codigor->updater->name }}</span>
            <br>
            <span>{{ $codigor->updated_at }}</span>
            <br>
            <small class="text-muted">Actualizado</small>
        </p>
    </div>
</div>
<br>
