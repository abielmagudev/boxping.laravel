@csrf

<div class="form-group">
    <label for="select-nivel">
        <small>Tipo</small>
    </label>
    <div class="border rounded p-3" style="border-color:#CED4DA !important">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipo" value="aviso" id="radio-tipo-aviso" checked>
            <label class="form-check-label" for="radio-tipo-aviso">
                <span class="">Aviso - </span>
                <small class="">{{ $config['aviso']['descripcion'] }}</small>
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipo" value="alerta" id="radio-tipo-alerta" {{ checkable('alerta', $observacion->tipo) }}>
            <label class="form-check-label" for="radio-tipo-alerta">
                <span>Alerta - </span>
                <small>{{ $config['alerta']['descripcion'] }}</small>
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipo" value="critico" id="radio-tipo-critico" {{ checkable('critico', $observacion->tipo) }}>
            <label class="form-check-label" for="radio-tipo-critico">
                <span>Crítico - </span>
                <small>{{ $config['critico']['descripcion'] }}</small>
            </label>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="input-nombre">
        <small>Nombre</small>
    </label>
    <input name="nombre" value="{{ old('nombre', $observacion->nombre) }}" id="input-nombre" type="text" class="form-control" required>
</div>

<div class="form-group">
    <label for="textarea-descripcion">
        <small>Descripción</small>
    </label>
    <textarea name="descripcion" rows="5" id="textarea-descripcion" class="form-control">{{ old('descripcion', $observacion->descripcion) }}</textarea>
</div>
