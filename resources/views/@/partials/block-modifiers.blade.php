<?php

$settings = (object) [
    'model' => $model ?? new stdClass,
    'has_model' => isset($model) && is_object($model),
    'show_updated' => isset($show_updated) && is_bool($show_updated) ? $show_updated : true,
    'show_created' => isset($show_created) && is_bool($show_created) ? $show_created : true,
    'font_size' => isset($font_size) && is_string($font_size) ? $font_size : '0.6rem',
];

?>

@if( $settings->has_model )
<div class="text-center text-uppercase text-muted" style="font-size:{{ $settings->font_size }}">
    @if( $settings->show_updated )
    <span class="me-1">Actualizado {{ $settings->model->updated_at }}, {{ $settings->model->updater->name }}</span>
    @endif

    @if( $settings->show_updated && $settings->show_created )
    <span class="d-none d-md-inline-block">|</span>
    @endif

    @if( $settings->show_created )
    <span class="ms-1">Creado {{ $settings->model->created_at }}, {{ $settings->model->creator->name }}</span>
    @endif
</div>
@endif
