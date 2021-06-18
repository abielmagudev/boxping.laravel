<!-- Modal search destinatarios -->
@component('@.bootstrap.modal', [
  'id' => 'modal-search-destinatarios',
  'title' => 'Destinatarios',
  'header_close' => true,
])
  @slot('body')
  <br>
  <form action="{{ route('entradas.agregar.destinatario', $entrada) }}" method="get" autocomplete="off">
      <input name="search" placeholder="Buscar por nombre, dirección, teléfono..." type="search" id="input-search-destinatarios" class="form-control rounded-pill" required>
  </form>
  <br>
  @endslot
 @endcomponent
