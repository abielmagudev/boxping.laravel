@csrf
<div class="mb-3">
    <label for="input-nombre" class="form-label small">Nombre</label>
    <input name="nombre" value="{{ old('nombre', $etapa->nombre) }}" id="input-nombre" type="text" class="form-control {{ bootstrap_isInputInvalid('nombre', $errors) }}" required>
    @include('@.bootstrap.invalid-input-message', ['name' => 'nombre'])
</div>    
<div class="mb-3">
    <label for="input-orden" class="form-label small">Orden</label>
    <input name="orden" value="{{ old('orden', $etapa->orden) }}" id="input-orden" type="number" min="1" step="1" class="form-control {{ bootstrap_isInputInvalid('orden', $errors) }}" required>
    @include('@.bootstrap.invalid-input-message', ['name' => 'orden'])
</div>  
<div class="mb-3">
    <label class="form-label small">Tareas</label>
    <div class="border rounded p-3 {{ bootstrap_isInputInvalid('pais', $errors, 'border-danger) }}">
        @foreach($etapa->todas_tareas as $tarea => $descripcion)   
        <?php 
            $switch_id = 'checkbox' . ucfirst($tarea);
            $has_tarea = $etapa->hasTarea($tarea) ? $tarea : false;
            $checked = toggleChecked($tarea, old('tareas', $has_tarea));
        ?>   
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="{{ $switch_id }}" name="tareas[]" value="{{ $tarea }}" {{ $checked }}>
            <label class="form-check-label" for="{{ $switch_id }}">{{ ucfirst($descripcion ) }}</label>
        </div>
        @endforeach
    </div>
    @include('@.bootstrap.invalid-input-message', ['name' => 'tareas'])
</div>
<div class="row">
    <div class="col-sm">
        <div class="mb-3">
            <label for="select-medicion_peso" class="form-label small">Medición de peso</label>
            <select name="medicion_peso" id="select-medicion_peso" class="form-select {{ bootstrap_isInputInvalid('medicion_peso', $errors) }}">
                <option label="Cuaquiera" selected></option>
                @foreach($etapa->todas_mediciones_peso as $abbr => $value)
                <option value="{{ $abbr }}" {{ toggleSelected($abbr, old('medicion_peso', $etapa->medicion_unica_peso)) }}>{{ ucfirst($value) }}</option>
                @endforeach
            </select>
            @include('@.bootstrap.invalid-input-message', ['name' => 'medicion_peso'])
        </div>
    </div>
    <div class="col-sm">
        <div class="mb-3">
            <label for="select-medicion_volumen" class="form-label small">Medición de volúmen</label>
            <select name="medicion_volumen" id="select-medicion_volumen" class="form-select {{ bootstrap_isInputInvalid('medicion_volumen', $errors) }}">
                <option label="Cualquiera" selected></option>
                @foreach($etapa->todas_mediciones_volumen as $abbr => $value)
                <option value="{{ $abbr }}" {{ toggleSelected($abbr, old('medicion_volumen', $etapa->medicion_unica_volumen)) }}>{{ ucfirst($value) }}</option>
                @endforeach
            </select>
            @include('@.bootstrap.invalid-input-message', ['name' => 'medicion_volumen'])
        </div>
    </div>
</div>
<br>
