<div class="card">
    <div class="card-header">
        <p>Información</p>
        @include('entradas.show.informacion.tabs')
    </div>
    <div class="card-body">
        <br>
        <div class="tab-content" id="entrada-tabs-contents">
            @include('entradas.show.informacion.content-entrada')
            @include('entradas.show.informacion.content-cruce')
            @include('entradas.show.informacion.content-reempaque')
        </div>
    </div>
</div>