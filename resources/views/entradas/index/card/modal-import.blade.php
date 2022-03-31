<?php

$modal = new class($component)
{
    public $id = 'modalEntradasImport';

    private $form = [
        'id' => 'formEntradasImport',
    ];

    public function __construct(object $component)
    {
        $this->form['consolidado'] = $component->cache('consolidado');
    }

    public function form(string $key)
    {
        return ! isset($this->form[$key]) ?: $this->form[$key];
    }
}

?>

@component('@.bootstrap.modal-trigger', [
    'classes' => 'dropdown-item',
    'modal_id' => $modal->id,
])
    <span>{!! $graffiti->design('file-earmark-arrow-up')->svg() !!}</span>
    <span class='align-middle ms-1'>Importar</span>
@endcomponent

@push('modals')
    @component('@.bootstrap.modal', [
        'id' => $modal->id,
        'header_settings' => [
            'title' => 'Importar entradas',
        ],
        'footer_settings' => [
            'close' => [
                'text' => 'Cancelar'
            ],
        ],
    ])
        @slot('body')
        <div class="text-muted px-3">
            <p>Instrucciones:</p>
            <ol>
                <li>Descargar la plantilla <a href="<?= asset('downloads/importar_entradas.csv') ?>" class="link-primary">importar_entradas.csv</a></li>
                <li>Llenar con información de cada columna de la plantilla.</li>
                <li>Las columnas <em>número de entrada</em>, <em>pesaje</em> y <em>destinatario</em> de la plantilla son obligatorios.</li>
            </ol>
            <p class="small mt-3 mb-0"><b>IMPORTANTE</b>: Los números de entrada ya existentes ó no cumplir con los requerimientos de la plantilla, <b>no se importará</b>.</p>
        </div>
        <br>
        <form action="<?= route('entradas.import.multiple') ?>" id="<?= $modal->form('id') ?>" method="post" enctype="multipart/form-data" class="alert alert-light">
            @csrf
            <div class="mb-3">
                <label for="importEntradas" class="form-label small">Cargar plantilla</label>
                <input type="file" name="import_entradas" id="importEntradas" class="form-control" accept=".csv" required>
            </div>
            @if(! is_object($modal->form('consolidado')) )
            <div class="mb-3">
                <label for="importEntradasCliente" class="form-label small">Cliente</label>
                <select name="import_entradas_cliente" id="importEntradasCliente" class="form-select" required>
                    <option disabled selected label="Seleccionar..."></option>
                    @foreach($clientes as $cliente)
                    <option value="<?= $cliente->id ?>">{{ $cliente->nombre }} (<?= $cliente->alias ?>)</option>
                    @endforeach
                </select>
            </div>
            
            @else
            <input type="hidden" name="import_entradas_consolidado" value="<?= $modal->form('consolidado')->id ?? '' ?>">

            @endif
        </form>
        @endslot

        @slot('footer')
        <button class="btn btn-outline-primary" type="submit" form="<?= $modal->form('id') ?>">Importar</button>
        @endslot
    @endcomponent
@endpush
