<?php

include resource_path('views/entradas/components/index/_entradas_form_config.php');

$component = (object) [
    'trigger_id' => 'modalEditMultipleTrigger',
    'content_id' => 'modalEditMultipleContent',
    'counter_id' => 'modalEditMultipleCounter',
    'modal_id' => 'modalEditMultiple',
    'editors' => [
        'cliente',
        'consolidado',
    ],
];

?>

@component('@.bootstrap.modal-trigger', [
    'classes' => 'dropdown-item',
    'dataset' => ['id' => $component->trigger_id],
    'modal_id' => $component->modal_id,
])
    <span>{!! $graffiti->design('pencil')->svg() !!}</span>
    <span class='align-middle ms-1'>Editar</span>
@endcomponent

@push('modals')
    @component('@.bootstrap.modal', [
        'id' => $component->modal_id,
        'header' => [
            'classes' => 'bg-warning',
            'title' => 'Editar entradas'
        ],
        'footer' => [
            'button_close' => [
                'text' => 'Cancelar',
            ]
        ], 
    ])
        @slot('body_content')
        <div id='<?= $component->content_id ?>'>
            <div class="row my-3 px-5">
                <div class="col-sm">
                    <div class="text-center text-warning">
                        {!! $graffiti->design('exclamation-triangle-fill', ['width' => 112, 'height' => 112])->svg() !!}
                    </div>
                </div>
                <div class="col-sm">
                    <div class="text-center text-secondary lead">
                        <p class="mt-2 mb-0">Se actualizarán</p>
                        <p class="h4">
                            <span id="<?= $component->counter_id ?>"></span>
                            <span>entradas</span>
                        </p>
                    </div>
                </div>
            </div>
 
            <div class="mb-3">
                <select name="editor" id="editorSelector" class="form-select">
                    <option disabled selected label="Editar..."></option>
                    @foreach($component->editors as $editor)
                    <option value="<?= $editor ?>">{{ ucfirst($editor) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="">
            @include("entradas.components.index.modal-edit.all")
            </div>
        </div>
        @endslot

        @slot('footer_content')
        <button class="btn btn-outline-warning" type="button" data-entradas-form-action="<?= route('entradas.update.multiple') ?>" data-entradas-form-method="put">Actualizar</button>
        @endslot
    @endcomponent
@endpush
   
@push('scripts')
<script>
const modalEditMultipleContent = {
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
    },
    showEditor: function (name) {
        let editors = this.element.querySelectorAll('.is-editor-multiple')

        editors.forEach(editor => {

            if( editor.nodeName == 'SELECT' ) {
                editor.selectedIndex = 0
            } else {
                editor.value = null
            }

            editor.disabled = editor.name != name
            editor.parentNode.classList.toggle('d-none', editor.name != name)
        })
    }
}

const modalEditMultipleTrigger = {
    trigger: document.getElementById("<?= $component->trigger_id ?>"),
    listening: function () {
        this.trigger.addEventListener('click', (e) => modalEditMultipleContent.update() )
    }
}
modalEditMultipleTrigger.listening()

const editorSelector = {
    element: document.getElementById('editorSelector'),
    listening: function () {
        this.element.addEventListener('change', (e) => modalEditMultipleContent.showEditor(e.target.value))
    }
}
editorSelector.listening()

</script>
@endpush
