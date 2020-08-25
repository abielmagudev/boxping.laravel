<div class="card">
    <div class="card-header">
        <p>Trayectoria</p>
        @include('entradas.show.trayectoria.tabs-trayectoria')
    </div>
    <div class="card-body">
        <br>
        <div class="tab-content" id="entrada-tabs-contents">
            @include('entradas.show.trayectoria.content-salida')
            @include('entradas.show.trayectoria.content-destinatario')
            @include('entradas.show.trayectoria.content-remitente')
        </div>
    </div>
</div>