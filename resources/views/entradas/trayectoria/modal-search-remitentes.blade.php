@component('components.modal', [
  'id' => 'modal-search-remitentes',
  'header_title' => 'Remitentes',
])
  @slot('body')
  <form action="{{ route('entradas.agregar.remitente', $entrada) }}" method="get" autocomplete="off">
      <input name="search" placeholder="Buscar por nombre, dirección, teléfono..." type="search" id="input-search-remitentes" class="form-control rounded-pill" required>
  </form>
  <br>
  @endslot
@endcomponent
