<div class="tab-pane fade" id="destinatario" role="tabpanel" aria-labelledby="destinatario-tab">

    @if( is_object($entrada->destinatario) )
    <p>
        <small class="d-block text-muted">Nombre</small>
        <span>{{ $entrada->destinatario->nombre }}</span>
    </p>
    <p>
        <small class="d-block text-muted">Dirección</small>
        <span>{{ $entrada->destinatario->direccion }}</span>
    </p>
    <p>
        <small class="d-block text-muted">Código postal</small>
        <span>{{ $entrada->destinatario->codigo_postal }}</span>
    </p>
    <p>
        <small class="d-block text-muted">Localidad</small>
        <span>{{ $entrada->destinatario->localidad }}</span>
    </p>
    <p>
        <small class="d-block text-muted">Teléfono</small>
        <span>{{ $entrada->destinatario->telefono }}</span>
    </p>
    <p>
        <small class="d-block text-muted">Referencias</small>
        <span>{{ $entrada->destinatario->referencias }}</span>
    </p>
    <p>
        <small class="d-block text-muted">Verificación</small>
        <span>
            @if( is_object($entrada->destinatario->verificador) )
            {{ $entrada->destinatario->verificador->name }}
            <br>
            @endif
            {{ $entrada->destinatario->verificado_at }}
        </span>
    </p>
    <p>
        <small class="d-block text-muted">Actualizado</small>
        <span>{{ $entrada->updater->name }}</span>
        <br>
        <span>{{ $entrada->updated_at }}</span>
    </p>
    <br>

    <div class="text-right">
        <a href="{{ route('destinatarios.edit', $entrada->destinatario) }}" class="btn btn-warning btn-sm">Editar destinatario</a>
    </div>

    @else
    <br>
    <p class="text-center">
        <a href="{{ route('destinatarios.create', ['entrada' => $entrada]) }}" class="btn btn-outline-success">Agregar destinatario a la entrada</a>
    </p>

    @endif
</div>