<ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="pills-reempacadores-tab" data-bs-toggle="pill" href="#pills-reempacadores" role="tab" aria-controls="pills-reempacadores" aria-selected="false">
            <span class="">Reempacadores</span>
            <span class="badge rounded-pill bg-primary border border-white">{{ $reempacadores->count() }}</span>
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-codigosr-tab" data-bs-toggle="pill" href="#pills-codigosr" role="tab" aria-controls="pills-codigosr" aria-selected="true">
            <span class="">Códigos</span>
            <span class="badge rounded-pill bg-primary border border-white">{{ $codigosr->count() }}</span>
        </a>
    </li>
</ul>
