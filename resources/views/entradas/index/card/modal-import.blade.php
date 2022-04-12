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
        <div class=" px-3">
            <p>Instrucciones:</p>
            <ol>
                <li>Descargar la plantilla <a href="<?= asset('download/importar_guias.csv') ?>" class="link-primary">importar guias.csv</a></li>
                <li>Llenar con información cada columna de la plantilla.</li>
                <li>Las columnas <em>número de entrada</em>, <em>medidas</em> y <em>destinatario</em> son obligatorios.</li>
            </ol>
        </div>
        <form action="<?= route('entradas.import.multiple') ?>" id="<?= $modal->form('id') ?>" method="post" enctype="multipart/form-data" class="alert alert-light border">
            @csrf

            {{-- Archivo CSV para importar guias de entrada --}}
            <div class="mb-3">
                <label for="importEntradas" class="form-label small">Plantilla CSV</label>
                <input type="file" name="import_entradas" id="importEntradas" class="form-control" accept=".csv" required>
            </div>

            {{-- Cliente del consolidado o cliente de entrada sin consolidar --}}
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

            {{-- Etapa de entradas (pesaje y volumen) - OBLIGATORIO??? --}}
            <div class="mb-3">
                <label for="importEntradasEtapa" class="form-label small">Etapa</label>
                <select name="import_entradas_etapa" id="importEntradasEtapa" class="form-select">
                    <option disabled selected label="Seleccionar..."></option>
                    @foreach($etapas as $etapa)
                    <option value="<?= $etapa->id ?>">{{ $etapa->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </form>
        <div class="alert alert-warning">
            <small><b>IMPORTANTE</b>: Los números de entrada ya existentes ó no cumplir con los datos obligatorios de la plantilla, <b>no se importarán</b>.</small>
        </div>
        @endslot

        @slot('footer')
        <button class="btn btn-outline-primary" type="submit" form="<?= $modal->form('id') ?>">Importar</button>
        @endslot
    @endcomponent
@endpush
