<!-- Modal search Destinatario -->
<div class="modal fade" id="searchDestinatarios" tabindex="-1" aria-labelledby="searchDestinatariosLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="searchDestinatariosLabel">Buscar destinatario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('entradas.agregar.destinatario', $entrada) }}" method="get" autocomplete="off" class="position-relative">
            <div class="position-absolute d-none d-sm-block" style="right:0">
                <button class="btn btn-primary rounded-pill px-4" type="submit">Buscar</button>
            </div>
            <input name="search" placeholder="Nombre, dirección, teléfono o ciudad" type="search" id="search-destinatarios" class="form-control rounded-pill px-4" required>
        </form>
        <br>
      </div>
      <div class="modal-footer d-none">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>