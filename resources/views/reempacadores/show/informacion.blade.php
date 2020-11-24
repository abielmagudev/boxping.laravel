<div class="card">
    @component('components.card-header-with-link', [
        'title' => 'Reempacador',
        'link' => route('reempacadores.edit', $reempacador),
        'color' => 'warning',
    ])
        @slot('content')<b>e</b>@endslot()
    @endcomponent

    <div class="card-body">
        <p>
            <span>{{ $reempacador->nombre }}</span>
            <br>
            <small class="text-muted">Nombre</small>
        </p>
        <p>
            <span>{{ $reempacador->creator->name }}</span>
            <br>
            <span>{{ $reempacador->created_at }}</span>
            <br>
            <small class="text-muted">Creado</small>
        </p>
        <p>
            <span>{{ $reempacador->updater->name }}</span>
            <br>
            <span>{{ $reempacador->updated_at }}</span>
            <br>
            <small class="text-muted">Actualizado</small>
        </p>
    </div>
</div>
<br>
