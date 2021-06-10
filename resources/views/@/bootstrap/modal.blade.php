<?php

$sizes = [
    'sm' => 'modal-sm', // Small
    'lg' => 'modal-lg', // Large
    'xl' => 'modal-xl', // Extra-large
];

$settings = (object) [
    'has_footer_close' => isset($footer_close) && is_bool($footer_close),
    'has_footer' => isset($footer) && is_string($footer),
    'has_header_close' => isset($header_close) && is_bool($header_close),
    'has_id' => isset($id) && is_string($id),
    'has_title' => isset($title) && is_string($title),
    'backdrop' => isset($backdrop) && $backdrop === true ? 'data-bs-backdrop="static" data-bs-keyboard="false"' : null,
    'body' => $body ?? null,
    'centered' => isset($centered) && $centered === true ? 'modal-dialog-centered' : null,
    'classes' => isset($classes) && is_string($classes) ? $classes : null,
    'footer' => $footer ?? null,
    'fullscreen' => isset($fullscreen) && $fullscreen === true ? 'modal-fullscreen' : null,
    'id_label' => "{$id}Label" ?? 'Label',
    'id' => $id ?? false,
    'scrollable' => isset($scrollable) && $scrollable === true ? 'modal-dialog-scrollable' : null,
    'size' => isset($size, $sizes[$size]) ? $sizes[$size] : null,
    'title' => $title ?? null,
];

?>

@if( $settings->has_id )
<div class="modal fade" tabindex="-1" aria-hidden="true" id="{{ $settings->id }}" aria-labelledby="{{ $settings->id_label }}" {!! $settings->backdrop !!}>
    <div class="modal-dialog {{ $settings->fullscreen }} {{ $settings->size }} {{ $settings->centered }} {{ $settings->scrollable }}">
        <div class="modal-content">

            @if( $settings->has_title || $settings->has_header_close )             
            <div class="modal-header">
                @if( $settings->has_title )
                <h5 class="modal-title" id="{{ $settings->id_label }}">{{ $settings->title }}</h5>
                @endif

                @if( $settings->has_header_close )
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                @endif
            </div>
            @endif

            <div class="modal-body">
                {!! $settings->body !!}
            </div>
            
            @if( $settings->has_footer || $settings->has_footer_close )
            <div class="modal-footer">
                @if( $settings->has_footer )
                {!! $settings->footer !!}
                @endif

                @if( $settings->has_footer_close ) 
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                @endif
            </div>
            @endif

        </div>
    </div>
</div>
@endif
