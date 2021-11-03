<?php

$items = ['icon', 'text'];

$settings = (object) [
    'only' => isset($only) && is_string($only) ? [$only] : $items,
];

?>

<a href="#!" class="link-danger text-decoration-none" data-bs-toggle="modal" data-bs-target="#modalConfirmDelete">
    @if( in_array('icon', $settings->only)  )      
    <span class="<?= (bool) array_diff($items, $settings->only) ?: 'me-1' ?>">
        @include('@.bootstrap.icon', ['icon' => 'trash-fill'])
    </span>
    @endif

    @if( in_array('text', $settings->only)  )      
    <span class="align-middle">
        Eliminar
    </span>
    @endif
</a>
