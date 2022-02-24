<?php

include resource_path('views/entradas/components/index/_entradas_form_config.php');

$component = (object) [
    'trigger_id' => 'modalDeleteMultipleTrigger',
    'content_id' => 'modalDeleteMultipleContent',
    'counter_id' => 'modalDeleteMultipleCounter',
    'modal_id' => 'modalDeleteMultiple',
];

?>

@include('@.bootstrap.modal-trigger', [
    'modal_id' => $component->modal_id,
    'data' => ['id' => $component->trigger_id],
    'classes' => 'dropdown-item',
    'text' => "<span>{$graffiti->design('x-lg')->svg()}</span>
                <span class='align-middle ms-1'>Eliminar</span>",
]) 

@push('modals')
    @component('@.bootstrap.modal', [
        'id' => $component->modal_id,
        'header' => [
            'title' => 'Eliminar entradas',
            'classes' => 'bg-danger text-white'
        ],
        'footer' => [
            'button_close' => [
                'text' => 'Cancelar'
            ],
        ],
    ])
        @slot('body_content')
        <div class="row my-3 px-5" id='<?= $component->content_id ?>'>
            <div class="col-sm">
                <div class="text-center text-danger">
                    {!! $graffiti->design('exclamation-octagon-fill', ['width' => 112, 'height' => 112])->svg() !!}
                </div>
            </div>
            <div class="col-sm">
                <div class="text-center text-secondary lead">
                    <p class="mt-2 mb-0">Se eliminarán permanentemente</p>
                    <p class="h4">
                        <span id="<?= $component->counter_id ?>"></span>
                        <span>entradas</span>
                    </p>
                </div>
            </div>
        </div>
        @endslot

        @slot('footer_content')
        <button class="btn btn-outline-danger" type="button" data-entradas-form-action="<?= route('entradas.destroy.multiple') ?>" data-entradas-form-method="delete">Eliminar</button>
        @endslot
    @endcomponent
@endpush
   
@push('scripts')
<script>
const modalDeleteMultipleTrigger = {
    trigger: document.getElementById("<?= $component->trigger_id ?>"),
    listening: function () {
        this.trigger.addEventListener('click', function () {
            modalDeleteMultipleContent.update()
        })
    }
}

const modalDeleteMultipleContent = {
    element: document.getElementById('<?= $component->content_id ?>'),
    counter: document.getElementById('<?= $component->counter_id ?>'),
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
modalDeleteMultipleTrigger.listening()

</script>
@endpush
