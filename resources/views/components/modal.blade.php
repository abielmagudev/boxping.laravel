<?php

// Default max-width: 500px
$sizes = [
    'sm' => 'modal-sm', // max-width: 300px
    'lg' => 'modal-lg', // max-width: 800px
    'xl' => 'modal-xl', // max-width: 1140px
];

$fullscreens = [
    'sm'   => 'modal-fullscreen-sm-down', // Below: 576px
    'md'   => 'modal-fullscreen-md-down', // Below 768px
    'lg'   => 'modal-fullscreen-lg-down', // Below 992px
    'xl'   => 'modal-fullscreen-xl-down', // Below 1200px
    'xxl'  => 'modal-fullscreen-xxl-down', // Below 1400px
    'full' => 'modal-fullscreen', // Always
];

$modal = (object) array(
    // ID modal
    'id' => isset($id) ? strval($id) : false,

    // Attributes backdrop modal
    'backdrop_classes' => isset($backdrop_classes) ? strval($backdrop_classes) : null,
    'backdrop_static' => isset($backdrop_static) && $backdrop_static === true ? 'data-bs-backdrop="static" data-bs-keyboard="false"' : null, 
    
    // Classes dialog
    'centered' => isset($centered) && $centered === true ? 'modal-dialog-centered' : null,
    'fullscreen' => isset($fullscreen) && array_key_exists($fullscreen, $fullscreens) ? $fullscreens[ $fullscreen ] : null,
    'scrollable' => isset($scrollable) && $scrollable === true ? 'modal-dialog-scrollable' : null,
    'size' => isset($size) && array_key_exists($size, $sizes) ? $sizes[ $size ] : null,
    
    // Classes content
    'classes' => isset($content_classes) ? strval($content_classes) : null,

    // Header modal
    'has_header' => isset($header_title) || isset($header_close) && $header_close === true,
    'header_classes' => isset($header_classes) ? strval($header_classes) : null,
    'header_title' => isset($header_title ) ? strval($header_title ) : null,
    'header_subtitle' => isset($header_subtitle ) ? strval($header_subtitle ) : null,
    'header_close' => isset($header_close) && is_bool($header_close) ? $header_close : true,
    
    // Body modal
    'body_classes' => isset($body_classes) ? strval($body_classes) : null,
    'body' => isset($body) ? $body : null,
    
    // Footer modal
    'has_footer' => isset($footer) || isset($footer_close),
    'footer_classes' => isset($footer_classes) ? strval($footer_classes) : null,
    'footer_close' => isset($footer_close) && is_bool($footer_close) ? $footer_close : false,
    'footer' => isset($footer) ? $footer : null,
);

?>

@if( is_string($modal->id) )
<div class="modal fade {{ $modal->backdrop_classes }}" id="{{ $modal->id }}" {!! $modal->backdrop_static !!} tabindex="-1" aria-labelledby="{{ $modal->id }}-label" aria-hidden="true">
    <div class="modal-dialog {{ $modal->centered }} {{ $modal->fullscreen }} {{ $modal->scrollable }} {{ $modal->size }}">
        <div class="modal-content {{ $modal->classes }}">
            
            @if( $modal->has_header )
            <div class="modal-header border-0 align-items-start {{ $modal->header_classes }}">
                <div id='modal-header-content'>
                    <h5 class="modal-title" id="{{ $modal->id }}-label">{{ $modal->header_title }}</h5>
                    @if( $modal->header_subtitle )
                    <h6 class="text-muted">{{ $modal->header_subtitle }}</h6>
                    @endif
                </div>

                @if( $modal->header_close )
                <div id='modal-header-close' class="mt-1">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @endif
            </div>
            @endif

            <div class="modal-body {{ $modal->body_classes }}">
                {!! $modal->body !!}
            </div>

            @if( $modal->has_footer )
            <div class="modal-footer {{ $modal->footer_classes }}">
                {!! $modal->footer !!}

                @if( $modal->footer_close )
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                @endif
            </div>
            @endif

        </div>
    </div>
</div>
@endif
