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

@include('@.bootstrap.modal-trigger', [
    'modal_id' => $component->modal_id,
    'data' => ['id' => $component->trigger_id],
    'classes' => 'dropdown-item',
    'text' => "<span>{$graffiti->design('pencil')->svg()}</span>
                <span class='align-middle ms-1'>Editar</span>",
]) 

@push('modals')
    @component('@.bootstrap.modal', [
        'id' => $component->modal_id,
        'header_close' => true,
        'footer_close' => true,
        'header_classes' => 'bg-warning',
        'title' => "<span>{$graffiti->design('exclamation-triangle-fill', ['width' => 24, 'height' => 24])->svg()}</span><span class='h4 align-middle ms-1'>Atención</span>"
    ])
        <div id='<?= $component->content_id ?>'>
            <p class="lead text-secondary text-center mt-3 mb-4">
                <span>Se actualizarán</span>
                <span class="fw-bold">
                    <span id="<?= $component->counter_id ?>"></span>
                    <span>entradas</span>
                </span>
            </p>
            <div class="mb-3">
                <select name="editor" id="editorSelector" class="form-select">
                    <option disabled selected label="Editar..."></option>
                    @foreach($component->editors as $editor)
                    <option value="<?= $editor ?>">{{ ucfirst($editor) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="">
                @foreach($component->editors as $editor_name)
                @includeIf("entradas.components.index.modal-edit.{$editor_name}")
                @endforeach
            </div>
        </div>

        @slot('footer')
        <button class="btn btn-warning" type="button" data-entradas-form-action="<?= route('entradas.update.multiple') ?>" data-entradas-form-method="put">Actualizar</button>
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
