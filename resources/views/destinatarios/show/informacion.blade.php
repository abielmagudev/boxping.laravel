<div class="card">
    @component('components.card-header-with-link', [
        'title' => 'Destinatario',
        'tooltip' => 'Editar',
        'link' => route('vehiculos.create'),
        'color' => 'warning',
    ])

        @slot('content')
        <b>e</b>
        @endslot
    @endcomponent
    <div class="card-body">
        <p>
            <span>{{ $destinatario->nombre }}</span>
            <small class="d-block text-muted">Nombre</small>
        </p>
        <p>
            <span>{{ $destinatario->direccion }}</span>
            <small class="d-block text-muted">Dirección</small>
        </p>
        <p>
            <span>{{ $destinatario->codigo_postal }}</span>
            <small class="d-block text-muted">Código postal</small>
        </p>
        <p>
            <span>{{ $destinatario->localidad }}</span>
            <small class="d-block text-muted">Localidad</small>
        </p>
        @if( $destinatario->referencias )
        <p>
            <span>{{ $destinatario->referencias }}</span>
            <small class="d-block text-muted">Referencias</small>
        </p>
        @endif
        <p>
            <span>{{ $destinatario->telefono }}</span>
            <small class="d-block text-muted">Teléfono</small>
        </p>
        <p>
            <span class="d-block">{{ $destinatario->creator->name }}</span>
            <span class="d-block">{{ $destinatario->created_at }}</span>
            <small class="d-block text-muted">Creado</small>
        </p>
        <p>
            <span class="d-block">{{ $destinatario->updater->name }}</span>
            <span class="d-block">{{ $destinatario->updated_at }}</span>
            <small class="d-block text-muted">Actualizado</small>
        </p>
    </div>
</div>
