<?php 

$settings = (object) [
    'has_header' => isset($title) || isset($subtitle) || isset($counter) || isset($center) || isset($options),
    'has_body' => $slot->isNotEmpty(),
    'has_footer' => isset($footer),
    'header' => (object) [
        'pretitle' => $pretitle ?? null,
        'title' => $title ?? null,
        'subtitle' => $subtitle ?? null,
        'has_counter' => isset($counter) && is_numeric($counter),
        'counter' => $counter ?? null,
        'center' => $center ?? null,
        'options' => $options ?? null,
    ],
    'body' => $slot ?? '',
    'footer' => $footer ?? '',
];

?>

<div class="card border-0 shadow-sm">
    <!-- Start header -->
    @if( $settings->has_header )
    <div class="card-header border-bottom bg-white py-3">
        <div class="d-flex justify-content-between align-items-center"> 
            <div class="text-start">
                @if( $settings->header->pretitle )
                <div class="text-muted small">{!! $settings->header->pretitle !!}</div>
                @endif

                @if( $settings->header->title )
                <span class="lead align-middle">{!! $settings->header->title !!}</span>
                @endif

                @if( $settings->header->has_counter )
                <span class="badge bg-dark">{!! $settings->header->counter !!}</span>
                @endif

                @if( $settings->header->subtitle )
                <div class="text-muted small">{!! $settings->header->subtitle !!}</div>
                @endif
            </div>

            <div class="text-center">{!! $settings->header->center !!}</div>

            <div class="text-end">{!! $settings->header->options !!}</div>
        </div>
    </div>
    @endif
    <!-- End header -->

    <!-- Start body -->
    @if( $settings->has_body )    
    <div class="card-body p-4">
        {!! $settings->body !!}
    </div>
    @endif
    <!-- End body -->

    <!-- Start footer -->
    @if( $settings->has_footer )
    <div class="card-footer bg-white py-4">
        {!! $settings->footer !!}
    </div>
    @endif
    <!-- End footer -->
</div>
