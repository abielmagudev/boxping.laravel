<!-- Modal remitentes search -->
@component('@.bootstrap.modal', [
  'header_classes' => 'border-0',
  'header_close' => true,
  'id' => 'modalSearchRemitentes',
  'title' => 'Buscar remitentes',
])
  @slot('body')
  <form action="{{ $results_route }}" method="get" autocomplete="off">
      <input name="search" placeholder="Escribe el nombre, dirección, teléfono..." type="search" id="inputSearchRemitentes" class="form-control rounded-pill" required>
  </form>
  <br>
  @endslot
@endcomponent
