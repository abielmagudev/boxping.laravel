<div class="text-right">
    <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#entradaComentariosModal">
        <span class="mr-1">Comentarios</span>
        <span class="badge badge-light rounded-pill">{{ $comentarios->count() }}</span>
    </button>
    <div class="d-inline-block">
        <div class="dropdown">
            <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span>Imprimir</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Etiqueta</a>
                <a class="dropdown-item" href="#">Salida</a>
            </div>
        </div>
    </div>
</div>
<br>
