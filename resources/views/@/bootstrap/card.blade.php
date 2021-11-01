<?php 

$settings = (object) [
    'has_header' => isset($title) || isset($subtitle) || isset($counter) || isset($center) || isset($options),
    'has_body' => $slot->isNotEmpty(),
    'has_footer' => isset($footer),
    'header' => (object) [
        'title' => $title ?? null,
        'subtitle' => $subtitle ?? null,
        'counter' => $counter ?? null,
        'center' => $center ?? null,
        'options' => $options ?? null,
    ],
    'body' => $slot ?? '',
    'footer' => $footer ?? '',
];

?>

<div class="card border-0 shadow-sm">
    @if( $settings->has_header )
    <div class="card-header border-bottom bg-white py-3">
        <div class="d-flex justify-content-between align-items-center"> 
            <div class="text-start">
                @if( $settings->header->title )
                <span class="lead align-middle">{!! $settings->header->title !!}</span>
                @endif

                @if( $settings->header->counter )
                <span class="badge bg-dark">{!! $settings->header->counter !!}</span>
                @endif

                @if( $settings->header->subtitle )
                <span class="d-block small">{!! $settings->header->subtitle !!}</span>
                @endif
            </div>

            <div class="text-center">{!! $settings->header->center !!}</div>

            <div class="text-end">{!! $settings->header->options !!}</div>
        </div>
    </div>
    @endif

    @if( $settings->has_body )    
    <div class="card-body p-4">
        {!! $settings->body !!}
    </div>
    @endif

    @if( $settings->has_footer )
    <div class="card-footer bg-white py-4">
        {!! $settings->footer !!}
    </div>
    @endif
</div>
