@if( $alertas->count() )
<label class="form-label small">Alertas</label>
<div class="border rounded p-3">
    <div class="">
        @foreach($alertas as $alerta)
        <?php $alerta_checked = in_array($alerta->id, $attached_alertas) ? 'checked' : '' ?>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="alertas[]" value="{{ $alerta->id }}" id="checkbox-alerta-{{ $alerta->id }}" style="border: 2px solid {{ $alerta->color }};" {{ $alerta_checked }}>
            
            <label class="form-check-label" for="checkbox-alerta-{{ $alerta->id }}">
                <span>{{ $alerta->nombre }}</span>
                <small class="d-none">{{ $alerta->descripcion }}</small>
            </label>
        </div>
        @endforeach
    </div>
</div>
@endif
