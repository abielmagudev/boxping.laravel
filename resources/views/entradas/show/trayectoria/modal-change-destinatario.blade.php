<!-- Modal destinatarios search -->
@component('@.bootstrap.modal', [
    'header_classes' => 'border-0',
    'header_close' => true,
    'id' => 'modalSearchToChangeDestinatario',
    'title' => 'Buscar destinatarios',
])
    <form action="{{ route('entradas.edit', $entrada) }}" method="get" autocomplete="off">
        <input type="hidden" name="editor" value="destinatario">
        <input type="search" name="buscar" placeholder="Escribe el nombre, dirección, teléfono..." id="inputBuscarDestinatarios" class="form-control rounded-pill" required>
    </form>
    <br>
@endcomponent
