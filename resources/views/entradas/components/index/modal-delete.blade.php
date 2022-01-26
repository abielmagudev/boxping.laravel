<?php

include resource_path('views/entradas/components/index/_entradas_form_config.php');

$component = new class()
{
    public $all_id = [
        'button' => 'buttonModalDeleteMultiple',
        'content' => 'contentModalDeleteMultiple',
        'counter' => 'counterModalDeleteMultiple',
        'modal' => 'modalDeleteMultiple',
    ];

    public function id(string $item)
    {
        return $this->all_id[$item];
    }
};

?>

@include('@.bootstrap.modal-trigger', [
    'modal_id' => $component->id('modal'),
    'data' => ['id' => $component->id('button')],
    'classes' => 'dropdown-item',
    'text' => "<span>{$graffiti->design('x-lg')->svg()}</span>
                <span class='align-middle ms-1'>Eliminar</span>",
]) 

@push('modals')
    @component('@.bootstrap.modal', [
        'id' => $component->id('modal'),
        'title' => 'Eliminar entradas',
        'header_close' => true,
        'footer_close' => true,
    ])
    <div class="text-center my-4" id='<?= $component->id('content') ?>'> 
        <div class="text-danger mb-3">
            {!! $graffiti->design('exclamation-triangle', ['width' => 104, 'height' => 104])->svg() !!}
        </div>

        <div class="text-secondary">
            <div class="h2 mb-4">¿Estás seguro?</div>
            <div class="px-4">
                <p>
                    <span>Se eliminará un total de entradas</span>
                    <b id="<?= $component->id('counter') ?>"></b>
                    <br>
                    <span>no estará disponible para próximas operaciones.</span>
                </p>
            </div>
            <small class="text-danger text-uppercase">* Eliminación permanente, no es recuperable</small>
        </div>

        @slot('footer')
        <button class="btn btn-danger" type="button" data-entradas-form-action="<?= route('entradas.destroy.multiple') ?>" data-entradas-form-method="delete">Eliminar</button>
        @endslot
    </div>
    @endcomponent
@endpush
   
@push('scripts')
<script>
    const buttonModalDeleteMultiple = {
        trigger: document.getElementById("<?= $component->id('button') ?>"),
        listening: function () {
            this.trigger.addEventListener('click', function () {
                contentModalDeleteMultiple.update()
            })
        }
    }

    const contentModalDeleteMultiple = {
        element: document.getElementById('<?= $component->id('content') ?>'),
        counter: document.getElementById('<?= $component->id('counter') ?>'),
        allCheckboxesEntradas: function () {
            return document.querySelectorAll('input[type=checkbox][id^=<?= $entradas_form_config->checkbox_prefix ?>]:checked');
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
