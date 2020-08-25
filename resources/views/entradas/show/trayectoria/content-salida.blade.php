<div class="tab-pane fade show active" id="salida" role="tabpanel" aria-labelledby="salida-tab">
    @if( isset($entrada->salida) )
    <div class="form-group">
        <label class="small">Transportadora</label>
        <div class="form-control"></div>
    </div>
    <div class="form-group">
        <label class="small">Rastreo</label>
        <div class="form-control"></div>
    </div>
    <div class="form-group">
        <label class="small">Confirmación</label>
        <div class="form-control"></div>
    </div>
    <div class="form-group">
        <label class="small">Cobertura</label>
        <div class="form-control"></div>
    </div>
    <div class="form-group">
        <label class="small">Status</label>
        <div class="form-control"></div>
    </div>
    <div class="form-group">
        <label class="small">Incidentes</label>
        <div class="form-control"></div>
    </div>
    <div class="form-group">
        <label class="small">Notas</label>
        <div class="border rounded-sm p-3"></div>
    </div>
    <div class="form-group">
        <label class="small">Actualizado</label>
        <div class="form-control"></div>
    </div>
    <p class="text-right">
        <a href="#1" class="btn btn-warning btn-sm">Editar salida</a>
    </p>

    @elseif( is_object($entrada->destinatario) && $entrada->destinatario->verificacion )
    <p class="text-center">
        <a href="#!" class="btn btn-outline-success">Crear salida</a>
    </p>

    @else
    <p class="text-center">Se require la <b>verificación del destinatario</b> para crear una guía de salida.</p>

    @endif
</div>