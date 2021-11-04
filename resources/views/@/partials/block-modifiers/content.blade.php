<?php

$model_cache = $model ?? new \stdClass;

$settings = (object) [
    'model' => $model_cache,
    'has_model' => $model_cache instanceof \Illuminate\Database\Eloquent\Model,
    'has_modifiers' => $model_cache instanceof \App\Ahex\Zowner\Domain\Contracts\ModifierIdentifiable,
    'has_timestamps' => property_exists($model_cache, 'timestamps') && $model_cache->timestamps,
    'show_updated' => isset($show_updated) && is_bool($show_updated) ? $show_updated : true,
    'show_created' => isset($show_created) && is_bool($show_created) ? $show_created : true,
];

?>

@if( $settings->has_model && $settings->has_timestamps || $settings->has_modifiers )
<div class="d-md-flex align-items-center justify-content-evenly text-muted text-uppercase text-center my-3" style="font-size:0.75rem">

    @if( $settings->show_updated )      
    <!-- Updated -->
    <div>
        <div class="mb-1" style="color:#B5B5B5">
            @include('@.bootstrap.icon', ['icon' => 'clock-history'])
            <span class="align-middle">Actualizado</span>
        </div>

        @if( $settings->has_timestamps )
        <div>{{ $settings->model->updated_at->format('d M, Y h:i:s a') }}</div> 
        @endif

        @if( $settings->has_modifiers )
        <div>{{ $settings->model->updater->name }}</div> 
        @endif
    </div>
    @endif

    <!-- Space in display mobile -->
    <div class="d-block d-md-none my-3"></div>

    @if( $settings->show_created )      
    <!-- Created -->
    <div class="">
        <div class="mb-1" style="color:#B5B5B5">
            @include('@.bootstrap.icon', ['icon' => 'clock-history'])
            <span class="align-middle">Creado</span>
        </div>

        @if( $settings->has_timestamps )
        <div>{{ $settings->model->created_at->format('d M, Y h:i:s a') }}</div> 
        @endif

        @if( $settings->has_modifiers )
        <div>{{ $settings->model->creator->name }}</div> 
        @endif
    </div>
    @endif

</div>
@endif


