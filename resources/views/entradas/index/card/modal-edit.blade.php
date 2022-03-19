<?php

$modal = new class($component)
{
    public $id = 'modalEditMultiple';

    public $content_id = 'modalEditMultipleContent';

    public $form = [
        'select_id' => 'selectEditEditors',
        'editors' => [
            'cliente',
            'consolidado',
        ]
    ];

    public function __construct(object $component)
    {
        $this->form['id'] = $component->form('id');
        $this->form['except'] = $component->except('editors', []);
    }

    public function form(string $key)
    {
        return ! array_key_exists($key, $this->form) ?: $this->form[$key];
    }

    public function allowEditor(string $editor)
    {
        return ! in_array($editor, $this->form('except'));
    }
}

?>

@component('@.bootstrap.modal-trigger', [
    'classes' => 'dropdown-item trigger-count-checked-entradas',
    'modal_id' => $modal->id,
])
    <span>{!! $graffiti->design('pencil')->svg() !!}</span>
    <span class='align-middle ms-1'>Editar</span>
@endcomponent

@push('modals')
    @component('@.bootstrap.modal', [
        'id' => $modal->id,
        'header' => [
            'classes' => 'bg-warning',
            'title' => 'ATENCION'
        ],
        'footer' => [
            'button_close' => [
                'text' => 'Cancelar',
            ]
        ], 
    ])
        @slot('body_content')
        <div id='<?= $modal->content_id ?>' class="px-4 mt-4">
            <div class="text-center">
                <p class="text-muted lead">Se actualizarán un total de entradas</p>
                <p class="h3">
                    <span class="show-count-checked-entradas">0</span>
                </p>
            </div>
            <hr>
            
            <div class="mb-3">
                <label for="<?= $modal->form('select_id') ?>" class="form-label small">Editar</label>
                <select name="editor" id="<?= $modal->form('select_id') ?>" class="form-select">
                    <option disabled selected label="Selecciona para editar..."></option>
                    @foreach($modal->form('editors') as $editor)
                    <option value="<?= $editor ?>">{{ ucfirst($editor) }}</option>
                    @endforeach
                </select>
            </div>
            <div>
            @foreach($modal->form('editors') as $editor)
                @includeWhen($modal->allowEditor($editor), "entradas.index.card.modal-edit-editors.{$editor}")
            @endforeach
            </div>
        </div>
        @endslot

        @slot('footer_content')
        <button class="btn btn-outline-warning" type="button" data-entradas-form-action="<?= route('entradas.update.multiple') ?>" data-entradas-form-verb="put">Actualizar</button>
        @endslot
    @endcomponent
@endpush
   
@push('scripts')
<script>
const editorsContainerHandler = {
    container: document.getElementById('<?= $modal->content_id ?>'),
    selector: document.getElementById('<?= $modal->form('select_id') ?>'),
    load: function (name) {
        this.container.querySelectorAll('.is-editor-multiple').forEach(editor => {

            editor.parentNode.classList.toggle('d-none', (editor.name != name))
            editor.disabled = editor.name != name

            if( editor.nodeName == 'SELECT' ) {
                editor.selectedIndex = 0
            } else {
                editor.value = null
            }
        })
    },
    listening: function () {
         this.selector.addEventListener('change', (e) => this.load(e.target.value))
    }
}
editorsContainerHandler.listening()

</script>
@endpush
