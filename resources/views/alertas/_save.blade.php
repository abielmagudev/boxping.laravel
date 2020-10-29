@csrf

<div class="form-group">
    <label for="select-nivel">
        <small>Nivel</small>
    </label>
    <div class="border rounded p-3" style="border-color:#CED4DA !important">
        <div class="d-table">
            <div class="d-table-row">
                <div class="d-table-cell form-check">
                    <input class="form-check-input" type="radio" name="nivel" value="alto" id="radio-nivel-alto" checked>
                    <label class="form-check-label" for="radio-nivel-alto">Alto</label>
                </div>
                <div class="d-table-cell">
                    <small class="text-muted">{{ $config['alto']['descripcion'] }}</small>
                </div>
            </div>
            <div class="d-table-row">
                <div class="d-table-cell form-check pr-3">
                    <input class="form-check-input" type="radio" name="nivel" value="medio" id="radio-nivel-medio" {{ checkable('medio', $alerta->nivel) }}>
                    <label class="form-check-label" for="radio-nivel-medio">Medio</label>
                </div>
                <div class="d-table-cell">
                    <small class="text-muted">{{ $config['medio']['descripcion'] }}</small>
                </div>
            </div>
            <div class="d-table-row">
                <div class="d-table-cell form-check">
                    <input class="form-check-input" type="radio" name="nivel" value="bajo" id="radio-nivel-bajo" {{ checkable('bajo', $alerta->nivel) }}>
                    <label class="form-check-label" for="radio-nivel-bajo">Bajo</label>
                </div>
                <div class="d-table-cell">
                    <small class="text-muted">{{ $config['bajo']['descripcion'] }}</small>
                </div>
            </div>
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
