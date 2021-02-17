<ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="pills-conductores-tab" data-bs-toggle="pill" href="#pills-conductores" role="tab" aria-controls="pills-conductores" aria-selected="true">
            <span class="">Conductores</span>
            <span class="badge rounded-pill bg-primary border border-white">{{ $conductores->count() }}</span>
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-vehiculos-tab" data-bs-toggle="pill" href="#pills-vehiculos" role="tab" aria-controls="pills-vehiculos" aria-selected="false">
            <span class="">Vehículos</span>
            <span class="badge rounded-pill bg-primary border border-white">{{ $vehiculos->count() }}</span>
        </a>
    </li>
</ul>
