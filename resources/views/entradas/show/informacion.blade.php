@component('@.bootstrap.card')
    @slot('body')

    <ul class="nav nav-tabs">
        <li class="nav-item">
        <a href="#resumen" id="resumen-tab" data-bs-toggle="tab" role="tab" class="nav-link active">Resumen</a>
        </li>
        <li class="nav-item">
            <a href="#reempaque" id="reempaque-tab" data-bs-toggle="tab" role="tab" class="nav-link">Reempaque</a>
        </li>
        <li class="nav-item">
            <a href="#importacion" id="importacion-tab" data-bs-toggle="tab" role="tab" class="nav-link">Importación</a>
        </li>
    </ul>

    <div class="tab-content mt-3" id="informacion-tabs-contents">
        @include('entradas.show.informacion.resumen')
        @include('entradas.show.informacion.reempaque')
        @include('entradas.show.informacion.importacion')
    </div>

    @endslot
@endcomponent
