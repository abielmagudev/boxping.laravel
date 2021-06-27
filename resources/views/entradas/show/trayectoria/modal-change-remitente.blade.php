<!-- Modal destinatarios search -->
@component('@.bootstrap.modal', [
    'header_classes' => 'border-0',
    'header_close' => true,
    'id' => 'modalSearchToChangeRemitente',
    'title' => 'Buscar remitentes',
])
    @slot('body')
    <form action="{{ route('entradas.edit', $entrada) }}" method="get" autocomplete="off">
        <input type="hidden" name="editor" value="remitente">
        <input type="search" name="buscar" placeholder="Escribe el nombre, dirección, teléfono..." id="inputBuscarRemitentes" class="form-control rounded-pill" required>
    </form>
    <br>
    @endslot
@endcomponent
