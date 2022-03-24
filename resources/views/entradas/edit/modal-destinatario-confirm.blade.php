<?php

$modal = (object) [
    'id' => 'modalDestinatarioConfirm',
    'form' => [
        'id' => 'formDestinatarioConfirm',
        'route' => route('entradas.update', $entrada),
    ],
];

?>

@include('@.bootstrap.modal-trigger', [
    'classes' => 'btn btn-primary',
    'modal_id' => $modal->id,
    'text' => 'Confirmar destinatario',
])

@push('modals')
    @component('@.bootstrap.modal', [
        'backstatic' => true,
        'id' => $modal->id,
        'footer_settings' => [
            'classes' => 'justify-content-center', 
            'close' => [
                'text' => 'No, aún no',
            ],
        ],
    ])
        @slot('body')
        <div class="px-4">
            <p class="h4 text-center">¿Se han realizado los siguientes <br> pasos de confirmación?</p>
            <br>
            <ol class="lead text-start ms-5">
                <li class="">Contactar al destinatario.</li>
                <li class="">Verificar la información de destino.</li>
                <li class="">Confirmar el envio del paquete.</li>
            </ol>

        </div>
        @endslot

        @slot('footer')
        <form action="<?= $modal->form['route'] ?>" id="<?= $modal->form['id'] ?>" method="post" autocomplete="off">
            @method('put')
            @csrf
            <input type="hidden" name="confirmado" value="yes">
            <button class="btn btn-outline-success" type="submit" form="<?= $modal->form['id'] ?>" name="actualizar" value="confirmado">Si, realizé cada paso</button>
        </form>
        @endslot
    @endcomponent
@endpush
