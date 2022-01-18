@component('@.bootstrap.modal', [
    'id' => 'modalDeleteMultiple',
    'title' => 'Eliminar entradas',
    'header_close' => true,
    'footer_close' => true,
])
<div class="text-center my-4" id='contentModalDeleteMultiple'> 
    <div class="text-danger mb-3">
        {!! $graffiti->design('exclamation-triangle', ['width' => 104, 'height' => 104])->svg() !!}
    </div>

    <div class="text-secondary">
        <div class="h2 mb-4">¿Estás seguro?</div>
        <div class="px-4">
            <p>
                <span>Se eliminará un total de entradas</span>
                <b id="contadorEntradasEliminar"></b>
                <br>
                <span>no estará disponible para próximas operaciones.</span>
            </p>
        </div>
        <small class="text-danger text-uppercase">* Eliminación permanente, no es recuperable</small>
    </div>

    @slot('footer')
    <button class="btn btn-danger" type="button" data-form-entradas-route="<?= route('entradas.destroy.multiple') ?>" data-form-entradas-method="delete">Eliminar</button>
    @endslot
</div>

@endcomponent

<script>
const buttonModalDeleteMultiple = {
    trigger: document.getElementById('buttonModalDeleteMultiple'),
    listening: function () {
        this.trigger.addEventListener('click', function () {
            contentModalDeleteMultiple.showtime()
        })
    }
}

const contentModalDeleteMultiple = {
    element: document.getElementById('contentModalDeleteMultiple'),
    countPresenter: document.getElementById('contadorEntradasEliminar'),
    allCheckboxesEntradas: function () {
        return document.querySelectorAll('input[type=checkbox][id^=checkbox-entrada-]:checked');
    },
    countCheckboxesEntradas: function () {
        return this.allCheckboxesEntradas().length
    },
    hasCheckboxesEntradas: function () {
        return this.countCheckboxesEntradas > 0
    },
    updateCountPresenter: function () {
        this.countPresenter.innerText = this.countCheckboxesEntradas()
    },
    showtime: function () {
        this.updateCountPresenter()
    }
}

buttonModalDeleteMultiple.listening()

</script>
