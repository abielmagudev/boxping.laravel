<?php

$settings = (object) [
    'entity' => $entity ?? new stdClass,
    'has_entity' => isset($entity) && is_object($entity),
    'show_updated' => isset($show_updated) && is_bool($show_updated) ? $show_updated : true,
    'show_created' => isset($show_created) && is_bool($show_created) ? $show_created : true,
];

?>

<div class="text-center text-uppercase text-muted" style="font-size:0.6rem">
    @if( $settings->show_updated )
    <span class="me-1">Actualizado {{ $settings->entity->updated_at }}, {{ $settings->entity->updater->name }}</span>
    @endif

    @if( $settings->show_updated  )
    <span class="d-none d-md-inline-block">|</span>
    @endif

    @if( $settings->show_created && $settings->show_created )
    <span class="ms-1">Creado {{ $settings->entity->created_at }}, {{ $settings->entity->creator->name }}</span>
    @endif
</div>
