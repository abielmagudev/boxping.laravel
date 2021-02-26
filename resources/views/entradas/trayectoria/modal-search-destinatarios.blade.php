<!-- Modal search destinatarios -->
@component('components.modal', [
  'id' => 'modal-search-destinatarios',
  'header_title' => 'Destinatarios',
])
  @slot('body')
  <form action="{{ route('entradas.agregar.destinatario', $entrada) }}" method="get" autocomplete="off">
      <input name="search" placeholder="Buscar por nombre, dirección, teléfono..." type="search" id="input-search-destinatarios" class="form-control rounded-pill" required>
  </form>
  <br>
  @endslot
 @endcomponent
