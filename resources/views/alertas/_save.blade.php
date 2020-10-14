@csrf

<div class="form-group">
    <label for="input-nombre">
        <small>Nombre</small>
    </label>
    <input name="nombre" value="{{ old('nombre', $alerta->nombre) }}" id="input-nombre" type="text" class="form-control" required>
</div>

<div class="form-group">
    <label for="select-nivel">
        <small>Nivel</small>
    </label>
    <div class="border rounded p-3" style="border-color:#CED4DA !important">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="nivel" value="aviso" id="radio-nivel-aviso" checked>
            <label class="form-check-label" for="radio-nivel-aviso">
                <span class="">Aviso - </span>
                <small class="">{{ $niveles['aviso']['descripcion'] }}</small>
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="nivel" value="advertencia" id="radio-nivel-advertencia" {{ checkable('advertencia', $alerta->nivel) }}>
            <label class="form-check-label" for="radio-nivel-advertencia">
                <span>Advertencia - </span>
                <small>{{ $niveles['advertencia']['descripcion'] }}</small>
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="nivel" value="critico" id="radio-nivel-critico" {{ checkable('critico', $alerta->nivel) }}>
            <label class="form-check-label" for="radio-nivel-critico">
                <span>Crítico - </span>
                <small>{{ $niveles['critico']['descripcion'] }}</small>
            </label>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="textarea-descripcion">
        <small>Descripción</small>
    </label>
    <textarea name="descripcion" rows="5" id="textarea-descripcion" class="form-control">{{ old('descripcion', $alerta->descripcion) }}</textarea>
</div>
