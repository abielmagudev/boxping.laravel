@if( $alertas->count() )
<div class="mb-3">
    <label class="form-label small">
        <span>Alertas</span>
    </label>
    <div class="border rounded overflow-auto" style="height:20vh">
        <ul class="list-group list-group-flush">
            @foreach($alertas as $alerta)
            <?php $alerta_checkbox_id = "checkbox-alerta-{$alerta->id}" ?>
            <li class="list-group-item list-group-item-action d-flex">
                <div class="me-3">
                    <input class="form-check-input" type="checkbox" id="{{ $alerta_checkbox_id }}" name="alertas[]" value="{{ $alerta->id }}">
                </div>
                <div class="">
                    <label for="{{ $alerta_checkbox_id }}"> {{ $alerta->nombre }}</label>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endif
