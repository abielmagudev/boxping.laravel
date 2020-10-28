<div class="form-group">
    <label>
        <small>Alertas</small>
    </label>
    <div class="border rounded p-3">
    @if( $alertas->count() )
    @foreach($alertas as $alerta)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="alertas[]" value="{{ $alerta->id }}" id="checkbox-alerta-{{ $alerta->id }}" {{ in_array($alerta->id, $alertas_attached) ? 'checked' : '' }}>
        <label class="form-check-label" for="checkbox-alerta-{{ $alerta->id }}">
            <span>{{ $alerta->nombre }}</span>
            <small class="d-none">{{ $alerta->descripcion }}</small>
        </label>
    </div>
    @endforeach
    @endif
    </div>
</div>
