<?php

$modal = (object) [
    'id' => $id,
    'title' => $title,
    'trigger' => [
        'classes' => isset($trigger['classes']) && is_string($trigger['classes']) ? $trigger['classes'] : 'btn btn-primary',
        'text' => isset($trigger['text']) && is_string($trigger['text']) ? $trigger['text'] : 'Buscar',
    ],
    'form' => [
        'id' => $form['id'] ?? "{$id}Form",
        'route' => $form['route'],
        'inputs' => $inputs ?? null,
    ],
];

?>

@include('@.bootstrap.modal-trigger', [
    'classes' => $modal->trigger['classes'],
    'text' => $modal->trigger['text'],
    'modal_id' => $modal->id,
])

@component('@.bootstrap.modal', [
    'id' => $modal->id,
    'header_settings' => [
        'title' => $modal->title,
    ],
    'footer_settings' => [
        'close' => [
            'text' => 'Cancelar'
        ],
    ],
])
    @slot('body')
    <form action="<?= $modal->form['route'] ?>" id="<?= $modal->form['id'] ?>" method="get" autocomplete="off">
        <input type="search" name="buscar" placeholder="Nombre, dirección, teléfono..." class="form-control rounded-pill" required>
        {!! $modal->form['inputs'] !!}
    </form>
    <br>
    @endslot

    @slot('footer')
    <button class="btn btn-primary" type="submit" form="<?= $modal->form['id'] ?>">Buscar</button>
    @endslot
@endcomponent
