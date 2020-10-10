<div class="card h-100">
    <div class="card-header">
        <p>Trayectoria</p>
        @include('entradas.show.trayectoria.tabs')
    </div>
    <div class="card-body overflow-auto" style="height:320px">
        <br>
        <div class="tab-content" id="trayectoria-tabs-contents">
            @include('entradas.show.trayectoria.content-salida')
            @include('entradas.show.trayectoria.content-destinatario')
            @include('entradas.show.trayectoria.content-remitente')
        </div>
    </div>
</div>
