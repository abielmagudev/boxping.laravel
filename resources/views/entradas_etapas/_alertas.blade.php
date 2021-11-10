@if( $alertas->count() )
<label class="form-label small">
    <span>Alertas</span>
    <span class="badge bg-dark">{{ count($attached_alertas) }}</span>
</label>
<div class="border rounded overflow-auto {{ bootstrap_isInputInvalid('slug', $errors, 'border-danger') }}" style="height:33vh">
    <ul class="list-group list-group-flush">
        @foreach($alertas as $alerta)
        <?php $alerta_checkbox_id = "checkbox-alerta-{$alerta->id}" ?>
        <?php $alerta_checked = in_array($alerta->id, $attached_alertas) ? 'checked' : '' ?>
        <li class="list-group-item list-group-item-action d-flex">
            <div class="me-3">
                <input class="form-check-input" type="checkbox" id="{{ $alerta_checkbox_id }}" name="alertas[]" value="{{ $alerta->id }}" {{ $alerta_checked }}>
            </div>
            <div class="">
                <label for="{{ $alerta_checkbox_id }}"> {{ $alerta->nombre }}</label>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@include('@.bootstrap.invalid-input-message', ['name' => 'alertas'])
@endif
