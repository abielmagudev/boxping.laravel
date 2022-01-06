<h6>Contenido</h6>
<div class="d-none mb-2" id="contentSelectionExample">
    <div class="flex-fill">
        <div class="input-group">
            <small class="input-group-text text-muted contents-counter"></small>
            <select name="contenido[]" id="select-contenido" class="form-select">
                <option selected disabled></option>
                @foreach($pagina->contenidos as $titulo => $contenido)
                <optgroup label="<?= ucfirst($titulo) ?>">
                    @foreach($contenido as $value => $label)
                    <option value="<?= $value ?>">{{ $label }}</option>
                    @endforeach
                </optgroup>
                @endforeach
            </select>
        </div>
    </div>
    <div class="ms-2">
        <button class="btn btn-danger fw-bold contents-remove-button" type="button">-</button>
    </div>
</div>
<button class="btn btn-outline-primary border-0 fw-bold w-100" type="button" style="padding:6px 10px" id="addContentButton">+</button>
<br>
<br>

<script>

const addContentButton = {
    button: document.getElementById('addContentButton'),
    example: document.getElementById('contentSelectionExample'),
    add: function () {
        element = this.factory() 
        this.button.before( element )
        this.enumerating()
    },
    factory: function () {
        cloned = this.example.cloneNode(true)
        cloned.classList.replace('d-none','d-flex')
        cloned.removeAttribute('id')
        cloned.querySelector('select').removeAttribute('id')
        cloned.querySelector('select').required = true
        removeContentButton.setup(cloned)
        
        return cloned
    },
    enumerating: function () {
        document.querySelectorAll('.contents-counter').forEach( function (element, index) {
            element.textContent = index
        })
    },
    listening: function () {
        this.button.addEventListener('click', () => this.add() )
    },
    shootClick: function () {
        this.button.dispatchEvent( new Event('click') )
    }
}

const removeContentButton = {
    classname: '.contents-remove-button',
    all: function () {
        return document.querySelectorAll( this.classname )
    },
    counter: function () { 
        return this.all().length 
    },
    setup: function (element) {
        element.querySelector( this.classname ).addEventListener('click', function () {
            this.parentElement.parentElement.remove()
            addContentButton.enumerating()
        })
    }
}

addContentButton.listening()
addContentButton.shootClick()

</script>
