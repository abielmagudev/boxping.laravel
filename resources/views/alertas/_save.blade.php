@csrf

<div class="form-group">
    <label for="select-nivel">
        <small>Nivel</small>
    </label>
    <div class="border rounded p-3" style="border-color:#CED4DA !important">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="nivel" value="bajo" id="radio-nivel-bajo" checked>
            <label class="form-check-label" for="radio-nivel-bajo">
                <span class="">Bajo - </span>
                <small class="">{{ $config['bajo']['descripcion'] }}</small>
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="nivel" value="medio" id="radio-nivel-medio" {{ checkable('medio', $alerta->nivel) }}>
            <label class="form-check-label" for="radio-nivel-medio">
                <span>Medio - </span>
                <small>{{ $config['medio']['descripcion'] }}</small>
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="nivel" value="alto" id="radio-nivel-alto" {{ checkable('alto', $alerta->nivel) }}>
            <label class="form-check-label" for="radio-nivel-alto">
                <span>Alto - </span>
                <small>{{ $config['alto']['descripcion'] }}</small>
            </label>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="input-nombre">
        <small>Nombre</small>
    </label>
    <input name="nombre" value="{{ old('nombre', $alerta->nombre) }}" id="input-nombre" type="text" class="form-control" required>
</div>

<div class="form-group">
    <label for="textarea-descripcion">
        <small>Descripción</small>
    </label>
    <textarea name="descripcion" rows="5" id="textarea-descripcion" class="form-control">{{ old('descripcion', $alerta->descripcion) }}</textarea>
</div>
