@component('@.bootstrap.card')
    @slot('body')

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="#salida" id="salida-tab" data-bs-toggle="tab" role="tab" class="nav-link active">Salida</a>
        </li>
        <li class="nav-item">
            <a href="#destinatario" id="destinatario-tab" data-bs-toggle="tab" role="tab" class="nav-link">Destinatario</a>
        </li>
        <li class="nav-item">
            <a href="#remitente" id="remitente-tab" data-bs-toggle="tab" role="tab" class="nav-link">Remitente</a>
        </li>
    </ul>

    <div class="tab-content mt-3" id="trayectoria-tabs-contents">
        @include('entradas.show.trayectoria.salida')
        @include('entradas.show.trayectoria.destinatario')
        @include('entradas.show.trayectoria.remitente')
    </div>

    @endslot
@endcomponent