<div class="tab-pane fade" id="destinatario" role="tabpanel" aria-labelledby="destinatario-tab">

    @if( is_object($entrada->destinatario) )
    <table class="table align-middle">
        <tbody>
            <tr>
                <td class="text-muted small">Nombre</td>
                <td>{{ $entrada->destinatario->nombre }}</td>
            </tr>
            <tr>
                <td class="text-muted small">Teléfono</td>
                <td>{{ $entrada->destinatario->telefono }}</td>
            </tr>
            <tr>
                <td class="text-muted small">Dirección</td>
                <td>{{ $entrada->destinatario->direccion }}</td>
            </tr>
            <tr>
                <td class="text-muted small">Postal</td>
                <td>{{ $entrada->destinatario->codigo_postal }}</td>
            </tr>
            <tr>
                <td class="text-muted small">Localidad</td>
                <td>{{ $entrada->destinatario->localidad }}</td>
            </tr>
            <tr>
                <td class="text-muted small">Referencias</td>
                <td>{{ $entrada->destinatario->referencias }}</td>
            </tr>
        </tbody>
    </table>
    <br>

    <div class="text-end">
        <button data-bs-toggle="modal" data-bs-target="#modal-search-destinatarios" type="button" class="btn btn-outline-primary btn-sm">
            <span>Cambiar destinatario</span>
        </button>
        <a href="{{ route('destinatarios.edit', ['destinatario' => $entrada->destinatario_id, 'entrada' => $entrada->id]) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="left" title="Editar destinatario">
            <span>Editar destinatario</span>
        </a>
    </div>

    @else
    <p class="text-center mt-5">
        <button type="button" data-bs-toggle="modal" data-bs-target="#modal-search-destinatarios" class="btn btn-primary btn-lg">Agregar destinatario</button>
    </p>

    @endif
</div>
