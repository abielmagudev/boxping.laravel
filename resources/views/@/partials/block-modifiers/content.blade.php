<?php

$settings = (object) [
    'model' => $model ?? new stdClass,
    'has_model' => isset($model) && is_object($model),
    'show_updated' => isset($show_updated) && is_bool($show_updated) ? $show_updated : true,
    'show_created' => isset($show_created) && is_bool($show_created) ? $show_created : true,
];

?>

@if( $settings->has_model )
<div class="d-flex justify-content-center text-muted small">
    <div class="text-end me-2">
        @if( $settings->show_updated )
        <small class="d-block">ACTUALIZADO</small>
        @endif
        
        @if( $settings->show_created )
        <small>CREADO</small>
        @endif
    </div>
    
    <div class="">
        @if( $settings->show_updated )
        <small class="d-block">{{ $settings->model->updated_at->format('d M, Y h:i:s a') }}, {{ $settings->model->updater->name }}</small>
        @endif

        @if( $settings->show_created )
        <small>{{ $settings->model->created_at->format('d M, Y h:i:s a') }}, {{ $settings->model->creator->name }}</small>
        @endif
    </div>
</div>
@endif
