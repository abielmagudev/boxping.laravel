<?php

$component = (object) [
    'form_id' => 'formEntradasImport',
    'modal_id' => 'modalEntradasImport',
];

?>

@component('@.bootstrap.modal-trigger', [
    'classes' => 'dropdown-item',
    'modal_id' => $component->modal_id,
])
    <span>{!! $graffiti->design('file-earmark-arrow-up')->svg() !!}</span>
    <span class='align-middle ms-1'>Importar</span>
@endcomponent

@push('modals')
    @component('@.bootstrap.modal', [
        'id' => $component->modal_id,
        'header' => [
            'title' => 'Importar entradas',
        ],
        'footer' => [
            'button_close' => [
                'text' => 'Cancelar'
            ],
        ],
    ])
        @slot('body_content')
        <p>Instrucciones para importar información de entradas:</p>
        <ol>
            <li>Descargar la plantilla <a href="<?= asset('downloads/importar_entradas.csv') ?>" class="link-primary">importar_entradas.csv</a></li>
            <li>Llenar la información de cada columna de la plantilla.</li>
            <li>Las columnas <em>número de entrada</em>, <em>pesaje</em> y <em>destinatario</em> de la plantilla son obligatorios.</li>
        </ol>
        <p class="small mb-4"><b>IMPORTANTE</b>: Los números de entrada ya existentes ó no cumplir con los requerimientos de la plantilla, <b>no se importará</b>.</p>
        <form action="<?= route('entradas.import.multiple') ?>" id="<?= $component->form_id ?>" method="post" enctype="multipart/form-data" class="border border-primary rounded p-3">
            @csrf
            <div class="mb-3">
                <label for="importEntradas" class="form-label small">Cargar plantilla</label>
                <input type="file" name="import_entradas" id="importEntradas" class="form-control" accept=".csv" required>
            </div>
            @if(! isset($consolidado) )
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
            <input type="hidden" name="import_entradas_consolidado" value="<?= $consolidado->id ?>">

            @endif
        </form>
        @endslot

        @slot('footer_content')
        <button class="btn btn-outline-primary" type="submit" form="<?= $component->form_id ?>">Importar</button>
        @endslot
    @endcomponent
@endpush
