<ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="pills-destinatarios-tab" data-bs-toggle="pill" href="#pills-destinatarios" role="tab" aria-controls="pills-destinatarios" aria-selected="false">
            <span class="">Destinatarios</span>
            <span class="badge rounded-pill bg-primary border border-white">{{ $destinatarios->count() }}</span>
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-remitentes-tab" data-bs-toggle="pill" href="#pills-remitentes" role="tab" aria-controls="pills-remitentes" aria-selected="true">
            <span class="">Remitentes</span>
            <span class="badge rounded-pill bg-primary border border-white">{{ $remitentes->count() }}</span>
        </a>
    </li>
</ul>
