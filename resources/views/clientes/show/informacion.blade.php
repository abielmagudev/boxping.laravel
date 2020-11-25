<div class="card">
    @component('components.card-header-with-link', [
        'title' => 'Cliente',
        'tooltip' => 'Editar',
        'link' => route('clientes.edit', $cliente),
        'color' => 'warning'
    ])

        @slot('content')
        <b>e</b>
        @endslot
    @endcomponent
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
<br>
