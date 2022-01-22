<?php

$modalDeleteHandler = new class()
{
    public $all_id = [
        'button' => 'buttonModalDeleteMultiple',
        'content' => 'contentModalDeleteMultiple',
        'counter' => 'counterModalDeleteMultiple',
        'modal' => 'modalDeleteMultiple',
    ];

    public function hasId(string $item)
    {
        return isset($this->all_id[$item]);
    }

    public function id(string $item)
    {
        return $this->all_id[$item];
    }
}

?>

@include('@.bootstrap.modal-trigger', [
    'modal_id' => $modalDeleteHandler->id('modal'),
    'data' => ['id' => $modalDeleteHandler->id('button')],
    'classes' => 'dropdown-item',
    'text' => "<span>{$graffiti->design('x-lg')->svg()}</span>
                <span class='align-middle ms-1'>Eliminar</span>",
]) 

@push('modals')
    @component('@.bootstrap.modal', [
        'id' => $modalDeleteHandler->id('modal'),
        'title' => 'Eliminar entradas',
        'header_close' => true,
        'footer_close' => true,
    ])
    <div class="text-center my-4" id='<?= $modalDeleteHandler->id('content') ?>'> 
        <div class="text-danger mb-3">
            {!! $graffiti->design('exclamation-triangle', ['width' => 104, 'height' => 104])->svg() !!}
        </div>

        <div class="text-secondary">
            <div class="h2 mb-4">¿Estás seguro?</div>
            <div class="px-4">
                <p>
                    <span>Se eliminará un total de entradas</span>
                    <b id="<?= $modalDeleteHandler->id('counter') ?>"></b>
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
@endpush
   
@push('scripts')
<script>
    const buttonModalDeleteMultiple = {
        trigger: document.getElementById("<?= $modalDeleteHandler->id('button') ?>"),
        listening: function () {
            this.trigger.addEventListener('click', function () {
                contentModalDeleteMultiple.update()
            })
        }
    }

    const contentModalDeleteMultiple = {
        element: document.getElementById('<?= $modalDeleteHandler->id('content') ?>'),
        counter: document.getElementById('<?= $modalDeleteHandler->id('counter') ?>'),
        allCheckboxesEntradas: function () {
            return document.querySelectorAll('input[type=checkbox][id^=checkboxEntrada]:checked');
        },
        countCheckboxesEntradas: function () {
            return this.allCheckboxesEntradas().length
        },
        hasCheckboxesEntradas: function () {
            return this.countCheckboxesEntradas > 0
        },
        updateCounter: function () {
            this.counter.innerText = this.countCheckboxesEntradas()
        },
        update: function () {
            this.updateCounter()
        }
    }

    buttonModalDeleteMultiple.listening()
</script>
@endpush
