<h6>Información</h6>
<div class="d-none mb-2" id="informationSelectionTemplate">
    <div class="flex-fill">
        <div class="input-group">
            <small class="input-group-text text-muted information-order"></small>
            <select name="informacion[]" id="select-informacion" class="form-select">
                <option selected disabled></option>
                @foreach($informantsManager::all() as $informant_name => $informant_class)
                <optgroup label="+ <?= ucfirst($informant_name) ?>">
                    @foreach($informant_class::getActionsDescriptions() as $action => $description)
                    <option value='<?= "{$informant_name}.{$action}" ?>'>{{ $description['completa'] }}</option>
                    @endforeach
                </optgroup>
                @endforeach
            </select>
        </div>
    </div>
    <div class="ms-2">
        <button class="btn btn-outline-danger fw-bold remove-information-button" type="button">-</button>
    </div>
</div>
<button class="btn btn-outline-primary fw-bold w-100 mb-2" type="button" style="padding:6px 10px" id="addInformationButton">+</button>
@include('@.bootstrap.invalid-input-message', ['name' => 'informacion'])
<div class="form-check">
    <input class="form-check-input" type="checkbox" name="tipo_descripcion" value="<?= $informantsManager::defaultDescriptionType() ?>" id="checkbox-tipo-descripcion-informacion" <?= $guia->hasTipoDescripcion() ? 'checked' : '' ?>>
    <label class="form-check-label" for="checkbox-tipo-descripcion-informacion">Mostrar descripciones de la información seleccionada en la guía impresa.</label>
</div>
@include('@.bootstrap.invalid-input-message', ['name' => 'tipo_descripcion'])
<br>
<br>

<script>
const addInformationButton = {
    button: document.getElementById('addInformationButton'),
    example: document.getElementById('informationSelectionTemplate'),
    add: function () {
        element = this.factory() 
        this.button.before( element )
        this.enumerating()
    },
    factory: function () {
        cloned = this.example.cloneNode(true)
        cloned.classList.replace('d-none','d-flex')
        cloned.removeAttribute('id')
        
        cloneSelect = cloned.querySelector('select')
        cloneSelect.removeAttribute('id')
        cloneSelect.required = true
        cloneSelect.value = this.values_selected.length > 0 ? this.values_selected.shift() : null
        
        removeInformationButton.setup(cloned)
        
        return cloned
    },
    enumerating: function () {
        document.querySelectorAll('.information-order').forEach( function (element, index) {
            element.textContent = index
        })
    },
    listening: function () {
        this.button.addEventListener('click', () => this.add() )
    },
    shootClick: function (loop = 1, values_selected = null) {

        this.values_selected = Array.isArray(values_selected) ? values_selected : []

        for(i = 1; i <= loop; i++)
            this.button.dispatchEvent( new Event('click') )
    }
}

const removeInformationButton = {
    classname: '.remove-information-button',
    all: function () {
        return document.querySelectorAll( this.classname )
    },
    counter: function () { 
        return this.all().length 
    },
    setup: function (element) {
        element.querySelector( this.classname ).addEventListener('click', function () {
            this.parentElement.parentElement.remove()
            addInformationButton.enumerating()
        })
    }
}

addInformationButton.listening()
addInformationButton.shootClick(<?= $guia->isReal() ? $guia->informacion_counter : 1 ?>, <?= $guia->informacion_json ?? '[]' ?>)
</script>
