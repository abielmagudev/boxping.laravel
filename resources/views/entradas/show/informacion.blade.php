@component('@.bootstrap.card')
    <div class="overflow-auto">
        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-salida-tab" data-bs-toggle="tab" data-bs-target="#content-salida" type="button" role="tab" aria-controls="nav-salida" aria-selected="true">Salida</button>
            <button class="nav-link" id="nav-destinatario-tab" data-bs-toggle="tab" data-bs-target="#content-destinatario" type="button" role="tab" aria-controls="nav-destinatario" aria-selected="false">Destinatario</button>
            <button class="nav-link" id="nav-remitente-tab" data-bs-toggle="tab" data-bs-target="#content-remitente" type="button" role="tab" aria-controls="nav-remitente" aria-selected="false">Remitente</button>
            <button class="nav-link" id="nav-reempacado-tab" data-bs-toggle="tab" data-bs-target="#content-reempacado" type="button" role="tab" aria-controls="nav-reempacado" aria-selected="false">Reempacado</button>
            <button class="nav-link" id="nav-importado-tab" data-bs-toggle="tab" data-bs-target="#content-importado" type="button" role="tab" aria-controls="nav-importado" aria-selected="false">Importado</button>
        </div>
    </div>
    <br>
    
    <div class="tab-content" id="informacionContentTabs">
        @include('entradas.show.informacion.salida')
        @include('entradas.show.informacion.destinatario')
        @include('entradas.show.informacion.remitente')
        @include('entradas.show.informacion.importado')
        @include('entradas.show.informacion.reempacado')
    </div>
@endcomponent
