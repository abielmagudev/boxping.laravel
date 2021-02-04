<div class="card h-100">
    <div class="card-header">
        <p>Información</p>
        @include('entradas.show.informacion.tabs')
    </div>
    <div class="card-body overflow-auto h-100">
        <div class="tab-content" id="informacion-tabs-contents">
            @include('entradas.show.informacion.content-entrada')
            @include('entradas.show.informacion.content-reempaque')
            @include('entradas.show.informacion.content-importacion')
        </div>
    </div>
</div>
