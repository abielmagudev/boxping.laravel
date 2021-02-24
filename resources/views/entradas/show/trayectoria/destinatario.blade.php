<div class="tab-pane fade" id="destinatario" role="tabpanel" aria-labelledby="destinatario-tab">

    @if( is_object($entrada->destinatario) )
    <p>
        <small class="d-block text-muted">Nombre</small>
        <span>{{ $entrada->destinatario->nombre }}</span>
    </p>
    <p>
        <small class="d-block text-muted">Dirección</small>
        <span class="">{{ $entrada->destinatario->direccion }}</span>,
        <span class="d-block">C.P. {{ $entrada->destinatario->codigo_postal }}</span>
        <span class="">{{ $entrada->destinatario->localidad }}</span>
    </p>
    <p>
        <small class="d-block text-muted">Teléfono</small>
        <span>{{ $entrada->destinatario->telefono }}</span>
    </p>
    <p>
        <small class="d-block text-muted">Referencias</small>
        <span>{{ $entrada->destinatario->referencias }}</span>
    </p>
    <br>

    <div class="text-end">
        <button data-toggle="modal" data-target="#searchDestinatarios" type="button" class="btn btn-primary btn-sm">
            <span>Cambiar destinatario</span>
        </button>
        <a href="{{ route('destinatarios.edit', ['destinatario' => $entrada->destinatario_id, 'entrada' => $entrada->id]) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="left" title="Editar destinatario">
            <span>Editar destinatario</span>
        </a>
    </div>

    @else
    <p class="text-center mt-5">
        <button type="button" data-bs-toggle="modal" data-bs-target="#searchDestinatarios" class="btn btn-primary btn-lg">Agregar destinatario</button>
    </p>

    @endif
</div>
