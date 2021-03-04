@csrf
<div class="mb-3">
    <label for="select-nivel" class="form-label small">Nivel</label>
    <!-- Alto -->
    <div class="row mb-3 mb-md-0">
        <div class="col-sm col-sm-1">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="nivel" value="alto" id="radio-nivel-alto" checked>
                <label class="form-check-label" for="radio-nivel-alto">Alto</label>
            </div>             
        </div>
        <div class="col-sm">
            <small class="text-muted">{{ $config['alto']['descripcion'] }}</small>
        </div>
    </div>
    <!-- Medio -->
    <div class="row mb-3 mb-md-0">
        <div class="col-sm col-sm-1">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="nivel" value="medio" id="radio-nivel-medio" {{ checkable('medio', $alerta->nivel) }}>
                <label class="form-check-label" for="radio-nivel-medio">Medio</label>
            </div>             
        </div>
        <div class="col-sm">
            <small class="text-muted">{{ $config['medio']['descripcion'] }}</small>
        </div>
    </div>
    <!-- Nivel bajo -->
    <div class="row mb-3 mb-md-0">
        <div class="col-sm col-sm-1">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="nivel" value="bajo" id="radio-nivel-bajo" {{ checkable('bajo', $alerta->nivel) }}>
                <label class="form-check-label" for="radio-nivel-bajo">Bajo</label>
            </div>             
        </div>
        <div class="col-sm">
            <small class="text-muted">{{ $config['bajo']['descripcion'] }}</small>
        </div>
    </div>
</div>

<div class="mb-3">
    <label for="input-nombre" class="form-label small">Nombre</label>
    <input name="nombre" value="{{ old('nombre', $alerta->nombre) }}" id="input-nombre" type="text" class="form-control" required>
</div>

<div class="mb-3">
    <label for="textarea-descripcion" class="form-label small">Descripción</label>
    <textarea name="descripcion" rows="5" id="textarea-descripcion" class="form-control">{{ old('descripcion', $alerta->descripcion) }}</textarea>
</div>
